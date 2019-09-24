<?php
require_once("model/Manager.php");
require_once ("model/DbConnect.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db=DbConnect::getConnection();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
//        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, reports.comment_id AS reported FROM comments LEFT JOIN reports ON (reports.comment_id = comments.id AND reports.user_ip=?) WHERE post_id = ? ORDER BY comment_date DESC ');
        $comments->execute(array($postId));
//        $comments->execute(array($postId, $ip));
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db=DbConnect::getConnection();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    public function reportComment($commentId, $REMOTE_ADDR) // on ajoute l'adresse IP du "signaleur de commentaire" dans la table reports (commentaires signalés)
    {
        $db=DbConnect::getConnection();
        $comments = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
        $comments->execute(array($commentId));
        $postId = $comments->fetchColumn();

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

}