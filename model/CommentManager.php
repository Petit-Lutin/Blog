<?php
require_once("model/Manager.php");
require_once ("model/DbConnect.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    public function reportComment($commentId, $REMOTE_ADDR) // on ajoute l'adresse IP du "signaleur de commentaire" dans la table reports (commentaires signalés)
    {
//        $db = $this->dbConnect();
        $db=DbConnect::getConnection();
        $comments = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
        $comments->execute(array($commentId));
        $postId = $comments->fetchColumn();
//        var_dump($postId);
//        die();
        $isOK = $postId;
        if ($postId !== false) {

//            try {
            $comments = $db->prepare('INSERT INTO reports (comment_id, user_ip) VALUES(?, ?)');
            $comments->execute(array($commentId, $REMOTE_ADDR));
            echo "Vous avez signalé ce commentaire";
//            } catch (Exception $e) {
            // on signale une seule fois un comm/utilisateur
//            }
        }
        return $isOK;
    }

    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=p4-blog;charset=utf8', 'root', '');
        return $db;
    }
}