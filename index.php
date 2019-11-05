<?php
require('controller/FrontOfficeController.php');
require('controller/BackOfficeController.php');

$frontOfficeController = new FrontOfficeController();
$backOfficeController = new BackOfficeController();

session_start();

try {

    if (isset($_GET['action'])) {

        switch ($_GET['action']) {
//            PARTIE ADMINISTRATION

//          s'identifier
            case 'login':
                $backOfficeController->getLogin();
                break;
            case 'post-login':
                $backOfficeController->postLogin();
                break;

//                créer un article
            case 'creer-article':

                if (isset($_SESSION['email'])) {

                    $backOfficeController->createPost();

                } else {
                    require('view/frontend/404.php');
                }
                break;
            case 'add-post':
                if (isset($_SESSION['email'])) {

                    $backOfficeController->addPost();
                } else {
                    require('view/frontend/404.php');
                }
                break;

//             éditer un article
            case 'modifier-article':
                if (isset($_SESSION['email'])) {
                    $backOfficeController->editPost();
                } else {
                    require('view/frontend/404.php');
                }
                break;
            case 'update-post':
                if (isset($_SESSION['email'])) {
                    $backOfficeController->updatePost();
                } else {
                    require('view/frontend/404.php');
                }
                break;

            // supprimer un article
            case 'supprimer-article':
                if (isset($_GET['id']) && isset($_SESSION['email'])) {
                    $backOfficeController->deletePost($_GET['id']);
                } else {
                    require('view/frontend/404.php');
                }
                break;


//                gérer les commentaires
            case
            'gerer-commentaires':
                if (isset($_SESSION['email'])) {
                    $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 0;
                    $backOfficeController->manageComments($page);
                } else {
                    require('view/frontend/404.php');
                }
                break;

            case 'delete-comment':
                if (isset($_SESSION['email'])) {
                    if (isset($_GET['commentid']) && (!empty($_GET['commentid']))) {
                        $backOfficeController->deleteComment($_GET['commentid']);
                    } else {
                        throw new Exception("Veuillez choisir un commentaire à supprimer");
                    }
                } else {
                    require('view/frontend/404.php');
                }
                break;

//                se déconnecter
            case 'logout':

                $backOfficeController->logOut();
                break;

//                PARTIE VISITEURS ET ADMINISTRATION
//                tous les articles
            case 'liste-articles':
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 0;
                $frontOfficeController->listPosts($page);
                break;

//                un article
            case 'article':
                if ((!empty($_GET['id']) && (isset($_GET['id'])) && (!empty($_GET['slug'])))) { /*   if (isset($_GET['id']) && $_GET['id'] > 0) {  }*/
                    $frontOfficeController->post();
                }
                break;

//                ajouter un commentaire
            case
            'add-comment':
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontOfficeController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                break;

//                signaler un commentaire
            case'report-comment':
                if (isset($_GET['commentid']) && (!empty($_GET['commentid']))) {
                    $frontOfficeController->reportComment($_GET['commentid'], $_SERVER['REMOTE_ADDR']);
                } else {
                    throw new Exception("Veuillez choisir un commentaire");
                }
                break;

            case 'about':
                require('view/frontend/about.php');
                break;
        }

    } else {
        $frontOfficeController->listPosts(0);
    }

} catch (Exception $e) {
    echo "ERREUR " . $e->getMessage();
}

