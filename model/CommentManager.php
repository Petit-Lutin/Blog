<?php

require_once("model/DbConnect.php");

class CommentManager
{
    public function listComments($page = 0) // liste de tous les commentaires en backoffice
    {
        $db = DbConnect::getConnection();
        $offset = $page * 10;
        $comments = $db->prepare('SELECT comments.id AS id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, post_id, posts.title AS post_title, slug, (reports.comment_id IS NOT NULL) AS reported FROM comments INNER JOIN posts ON (comments.post_id = posts.id) LEFT JOIN reports ON (reports.comment_id = comments.id) ORDER BY reports.comment_id AND comment_date_fr DESC LIMIT :offset, 10');
        $comments->bindParam(':offset', $offset, PDO::PARAM_INT);
        $comments->execute();
        return $comments;
    }

    public function getComments($postId, $REMOTE_ADDR) //pour afficher les commentaires sous chaque article, et les afficher différemment selon si l'utilisateur les a signalés ou non
    {
        $db = DbConnect::getConnection();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr, (reports.comment_id IS NOT NULL) AS reported FROM comments LEFT JOIN reports ON (reports.comment_id = comments.id AND reports.user_ip=:userip) WHERE post_id = :postid ORDER BY comment_date_fr DESC ');
        $comments->execute(['userip' => $REMOTE_ADDR, 'postid' => $postId]);
        return $comments;
    }

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
        $comments = $db->prepare('SELECT post_id FROM comments WHERE comments.id = ?');
        $comments->execute(array($commentId));
        $postId = $comments->fetchColumn(); //on récupère l'ID de l'article auquel est lié le commentaire
        $isOK = $postId;
        if ($postId !== false) { // on vérifie que l'article existe bien
            try {
                $comments = $db->prepare('INSERT INTO reports (comment_id, user_ip) VALUES(?, ?)'); //on ajoute le commentaire à la table reports ainsi que l'IP du "signaleur de commentaire"
                $comments->execute(array($commentId, $REMOTE_ADDR));
            } catch (Exception $e) {
                // un utilisateur (identifié par son IP) ne peut signaler un commentaire qu'une seule fois
            }
        }
        return $isOK;
    }

    public function deleteComment($commentId)
    {
        $db = DbConnect::getConnection();
        $comment = $db->prepare('DELETE FROM comments WHERE id = ?');
        $comment->execute([$commentId]);
        return $comment;
    }

}