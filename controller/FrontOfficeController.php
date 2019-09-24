<?php

//require('model/FrontOfficeControllerler.php');

// function listPosts()
// {
//     $posts = getPosts();

//     require('view/listPostsView.php');
// }

// function post()
// {
//     $post = getPost($_GET['id']);
//     $comments = getComments($_GET['id']);

//     require('view/postView.php');
// }

// function addComment($postId, $author, $comment)
// {
//     $affectedLines = postComment($postId, $author, $comment);

//     if ($affectedLines === false) {
//         die('Impossible d\'ajouter le commentaire !');
//     }
//     else {
//         header('Location: index.php?action=post&id=' . $postId);
//     }
// } 


// <?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class FrontOfficeController
{
    public function __construct()
    { //si on voulait ajouter des choses propres à la classe
    }

    public function listPosts($page)
    {
        $postManager = new PostManager(); // Création d'un objet
//        $posts = null;
        $posts = $postManager->getPosts($page);
//        echo $postsInfo['posts']->rowCount(); //retourne le nb de posts sur la page actuelle
//        echo $posts->rowCount();
        // Appel d'une fonction de cet objet //passer page en paramètre


        require('view/frontend/listPostsView.php');
        $posts->closeCursor();
    }


    public function post()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $slug = $post['slug'];

        $title = htmlspecialchars($post['title']);
        $comments = $commentManager->getComments($_GET['id']);

        require('view/frontend/postView.php');
    }



    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=article&id=' . $postId);
        }
    }

    public function reportComment($commentId, $REMOTE_ADDR)
    {
        $commentManager = new CommentManager();
//        $affectedLines = $commentManager->getComments($postId);
        $postId = $commentManager->reportComment($commentId, $REMOTE_ADDR);
        if ($postId === false) {
            throw new Exception('Impossible de signaler le commentaire !');
        }
        header('Location: index.php?action=article&id=' . $postId);
//var_dump();

    }
}
