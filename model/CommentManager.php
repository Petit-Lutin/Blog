<?php

require_once("model/Manager.php");
require_once("model/DbConnect.php");

class CommentManager extends Manager
{
    public function listComments($page = 0)
    {
        $db = DbConnect::getConnection();
        $offset = $page * 10;
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, (reports.comment_id IS NOT NULL) AS reported FROM comments LEFT JOIN reports ON (reports.comment_id = comments.id ) ORDER BY reports.comment_id AND comment_date_fr DESC LIMIT :offset, 10');
        $comments->bindParam(':offset', $offset, PDO::PARAM_INT);

//        $comments->execute(array($REMOTE_ADDR, $postId));
//        $comments->execute(['userip' => $REMOTE_ADDR, 'postid' => $postId]);
        $comments->execute();
        return $comments;
    }

    public function getComments($postId, $REMOTE_ADDR)
    {
        $db = DbConnect::getConnection();
//        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, (reports.comment_id IS NOT NULL) AS reported FROM comments LEFT JOIN reports ON (reports.comment_id = comments.id AND reports.user_ip=:userip) WHERE post_id = :postid ORDER BY comment_date_fr DESC ');
        $comments->execute(['userip' => $REMOTE_ADDR, 'postid' => $postId]);
        return $comments;
    }

//    public function getReportedComments($postId, $REMOTE_ADDR)
//    {
//        $db=DbConnect::getConnection();
////        $yourReportedComments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
//        $yourReportedComments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, reports.comment_id AS reported FROM comments LEFT JOIN reports ON (reports.comment_id = comments.id AND reports.user_ip=?) WHERE post_id = ? ORDER BY comment_date_fr DESC ');
////        $comments->execute(array($postId));
//        $yourReportedComments->execute(array($postId, $REMOTE_ADDR));
//        return $yourReportedComments;
//    }

    public function postComment($postId, $author, $comment)
    {
        $db = DbConnect::getConnection();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    public function reportComment($commentId, $REMOTE_ADDR) // on ajoute l'adresse IP du "signaleur de commentaire" dans la table reports (commentaires signalés)
    {
        $db = DbConnect::getConnection();
        $comments = $db->prepare('SELECT post_id FROM comments WHERE id = ?');
        $comments->execute(array($commentId));
        $postId = $comments->fetchColumn(); //on récupère l'ID de l'article auquel est lié le commentaire

        $isOK = $postId;
        if ($postId !== false) { // on vérifie que l'article existe bien
            try {
                $comments = $db->prepare('INSERT INTO reports (comment_id, user_ip) VALUES(?, ?)');
                $comments->execute(array($commentId, $REMOTE_ADDR));
                echo "Vous avez signalé ce commentaire";
            } catch (Exception $e) {
                // un utilisateur (identifié par son IP) ne peut signaler un commentaire qu'une seule fois
            }
        }
        return $isOK;
    }

}