<?php

// Chargement des classes
//use http\Header;

require_once("model/DbConnect.php");
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


class BackOfficeController
{
    public function __construct()
    {
    }

    public function adminLogin()
    { // formulaire d'authentification
        require('admin-login.php');
    }

    public function admin()
    { // pour l'accès à l'espace administration

        $userManager = new UserManager();
        $user = $userManager->getUser();
        $userEmailForm = htmlspecialchars($_POST['email']);
        $userPasswordForm = htmlspecialchars($_POST['password']);

        if ($userEmailForm === $user['email']) {
            $hashPassword = password_hash($userPasswordForm, PASSWORD_DEFAULT); //on hash+sale le mdp saisi par l'utilisateur
//            $userPasswordDb = $user['password'];
            $mdpOK = password_verify($userPasswordForm, $hashPassword); // on compare le mdp saison avec celui enregistré

            if ($mdpOK === true) {

//                $_SESSION['email'] = $userEmail;
//                $_SESSION['password'] = $userPassword;session_start();
                header('Location:index.php');
            }

        } else {
            echo "L'email ou le mot de passe est incorrect.";
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
        $postManager->addPost($_POST['title'], $_POST['content']);
        if ((isset($_POST['title'])) && (isset($_POST['content']))) {
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
        require('view/backend/editPostView.php');
    }

    public function updatePost()
    {
        if ((isset($_POST['title'])) && (isset($_POST['content']))) {
            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['content'];
            $postManager = new PostManager();
            $updatedPost = $postManager->updatePost($_GET['id'], $title, $content);
            header("Location: index.php?action=liste-articles&page=0"); //on redirige vers la liste des posts une fois que le post est créé
        } else {
            header("Location:index.php?action=modifier-article");
        }
    }

    public function logOut()
    {
        unset ($_SESSION['email']);
        header('Location:index.php');
    }
}