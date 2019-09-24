<?php

require('controller/FrontOfficeController.php');
require('controller/BackOfficeController.php');

//require('view/backend/newPostView.php');
$frontOfficeController = new FrontOfficeController();
$backOfficeController = new BackOfficeController();
try {


    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
            case 'liste-articles':
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 0;
                $frontOfficeController->listPosts($page);
                break;
            case 'admin-login':
                $backOfficeController->adminLogin();
                break;
            case 'admin':
                $backOfficeController->admin();
                break;
            case 'creer-article':
                $backOfficeController->createPost();
                break;
            case 'add-post':
                $backOfficeController->addPost();
                break;
            case 'article':
                $frontOfficeController->post();
                break;


            case 'modifier-article':
                $backOfficeController->editPost();
                break;
            case 'update-post':
                $backOfficeController->updatePost();
                break;
            case 'add-comment':
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontOfficeController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                break;
            case'report-comment':
                if (isset($_GET['commentid']) && (!empty($_GET['commentid']))) {
                    $frontOfficeController->reportComment($_GET['commentid'], $_SERVER['REMOTE_ADDR']);

                } else {
//                header('Location: index.php?action=article&id=' . $postId);
// renvoyer une fonction erreur de controller qui prend en arg du texte et qui renvoie "erreur"
                    throw new Exception("Veuillez choisir un commentaire");

                }
//                $frontOfficeController->post();
                break;

        }

    } else {
        $frontOfficeController->listPosts(0);
    }
} catch (Exception $e) {
    echo "ERREUR" . $e->getMessage();
}
/*if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listPosts();
}*/