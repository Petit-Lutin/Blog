<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');


class BackOfficeController
{
    public function __construct()
    {
    }

    public function adminLogin()
    {
        require('view/backend/admin-login.php');

        $userManager = new UserManager();
        $user = $userManager->getUser();
        $userEmail = $user['email'];
        $userPassword = $user['password'];
        if ((isset($_POST['email'])) && ($_POST['email'] === $userEmail)
            (isset($_POST['password'])) && ($_POST['password'] === $userPassword)

        ) {
            $_SESSION['email'] = $userEmail;
            $_SESSION['password'] = $userPassword;
        } else {
            echo "L'email ou le mot de passe est incorrect.";
        }
    }

    public function admin()
    { // pour l'accès à l'espace administration

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
        // require ('view/backend/newPostView.php');

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
//public function reportComment(){
//        $commentManager= new CommentManager();
//
//}

}