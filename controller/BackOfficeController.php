<?php

// Chargement des classes

require_once("model/DbConnect.php");
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


class BackOfficeController
{
    public function __construct()
    {
    }

    public function getLogin()
    { // formulaire d'authentification
        require('view/backend/login.php');
    }

    public function postLogin()
    { // pour l'accès à l'espace administration

        // il faut un mail non vide qui corresponde à une certaine syntaxe, et un mot de passe non vide
        if ((isset($_POST['email'])) && (!empty($_POST['email'])) && (preg_match('#^[a-z0-9]{3,}\@[a-z0-9]{3,}\.[a-z]{2,}$#', ($_POST['email'])) && (isset($_POST['password'])) && (!empty($_POST['password'])))) {

            $userEmailForm = htmlspecialchars($_POST['email']);  // ce qui est saisi par l'utilisateur/admin
            $userManager = new UserManager();

            $user = $userManager->getUser($userEmailForm); // on regarde si un mail correspond dans la table des utilisateurs enregistrés

            if ($user !== false) { //si cela correspond bien à un utilisateur todo:se renseigner filter
                $userPasswordForm = htmlspecialchars($_POST['password']);
                $mdpOK = password_verify($userPasswordForm, $user['password']); // //on hash+sale le mdp saisi par l'utilisateur et on compare le mdp saisi avec celui enregistré

                if ($mdpOK === true) {
                    $_SESSION['email'] = $user['email'];
                    header('Location:index.php'); // on peut se connecter
                } else {
                    $message = "L'email ou le mot de passe est incorrect.";
                    require('view/backend/login.php');
                }
            } else {
                $message = "L'email ou le mot de passe est incorrect.";
                require('view/backend/login.php');
            }
        } else {
            header('Location:index.php');
        }
    }

    public function createPost() //pour créer un nouvel article
    {
        $title = "Créer un nouvel article";
        require('view/backend/newPostView.php');
    }

//todo : penser à valider les données ->TBAb Steeve (+maxlength dans html)
    public function addPost()
    { //pour poster un nouvel article
        $postManager = new PostManager();
        $postManager->addPost($_POST['title'], $_POST['content'],$_POST['slug']);
        if ((isset($_POST['title'])) && (isset($_POST['content'])) && (isset($_POST['slug'])) && (preg_match('#^[a-z0-9\-]{3,}$#', ($_POST['slug'])))) {
            header("Location:index.php?action=liste-articles&page=0"); //on redirige vers la liste des posts une fois que le post est créé
        } else {
            header("Location:index.php?action=creer-article"); // sinon on reste sur la page de création d'article car titre ou contenu manquant
        }
    }

    public function editPost()
    {
        $postManager = new PostManager();
        $post = $postManager->getPost($_GET['id']);
        $title = htmlspecialchars($post['title']);
        $content = $post['content'];
        $slug = $post['slug'];
        require('view/backend/editPostView.php');
    }

    public function updatePost()
    {
        if ((isset($_POST['title'])) && (isset($_POST['content'])) && (isset($_POST['slug']))) {
            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['content'];
            $slug = htmlspecialchars($_POST['slug']);
            $postManager = new PostManager();
            $updatedPost = $postManager->updatePost($_GET['id'], $title, $content, $slug);
            header("Location: index.php?action=article&id=" . $_GET['id']); //on redirige vers la liste des posts une fois que le post est créé
        } else {
            header("Location:index.php?action=modifier-article");
        }
    }

    public function manageComments($page)
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->listComments($page);
        require('view/backend/manageComments.php');
    }

    public function deleteComment($commentId)
    {
        $commentManager = new CommentManager();
        $comment = $commentManager->deleteComment($commentId);

        if ($commentId === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
        }
        header('Location:index.php?action=gerer-commentaires');
    }

    public function logOut()
    {
        unset ($_SESSION['email']);
        header('Location:index.php');
    }
}