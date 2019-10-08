<?php
require('controller/FrontOfficeController.php');
require('controller/BackOfficeController.php');

$frontOfficeController = new FrontOfficeController();
$backOfficeController = new BackOfficeController();
session_start();

try {

    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
            case 'liste-articles':
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 0;
                $frontOfficeController->listPosts($page);
                break;
            case 'admin-login': //todo:get login puis postlogin
                $backOfficeController->getLogin();
                break;
            case 'admin':
                $backOfficeController->postLogin();
                break;
            case 'creer-article':
                $backOfficeController->createPost();
                break;
            case 'add-post':
                $backOfficeController->addPost();
                break;
            case 'gerer-commentaires':
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 0;
                $backOfficeController->manageComments($page);
                break;
            case 'article':
                if (!empty($_GET['id']) && (isset($_GET['id']))) { /*   if (isset($_GET['id']) && $_GET['id'] > 0) {  }*/
                    $frontOfficeController->post();
                }
                break;

            case 'modifier-article':
                $backOfficeController->editPost();
                break;
            case 'update-post':
                $backOfficeController->updatePost();
                break;
            case 'logout':
                $backOfficeController->logOut();
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
                break;
        }

    } else {
        $frontOfficeController->listPosts(0);
    }
} catch (Exception $e) {
    echo "ERREUR" . $e->getMessage();
}

