<?php

class PostManager
{
    public function getPosts($page = 0) //
    {
        $db = DbConnect::getConnection();
        $offset = $page * 5; //offset sert à savoir quel est l'article le plus bas affiché sur la page, avec 5 articles par page

//        $req = $db->query('SELECT COUNT(*) FROM posts');
//        $nbArticles = $req[0];

//        $nbArticles = $req->fetch()[0]; //pour PHP on récupère un tableau alors que notre requête SQL retourne une seule valeur, donc on demande la première ligne du tableau
//        $nbArticles = $req->fetchColumn(); //pour PHP on récupère un tableau alors que notre requête SQL retourne une seule valeur, donc on demande la première ligne du tableau // 1er champ de la 1ère ligne

//        $pageNb = ceil($nbArticles / 5);
//        echo $pageNb;
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, slug FROM posts ORDER BY creation_date DESC LIMIT :offset, 5');
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->execute();
        return $req;
    }

    public function getPost($postId)
    {
        $db = DbConnect::getConnection();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, slug FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function updatePost($postId, $title, $content)
    {
        $db = DbConnect::getConnection();
        $post = $db->prepare('UPDATE posts set title=?, content=? WHERE id = ?');
        $affectedLines = $post->execute(array($title, $content, $postId));
    }

    public function addPost($title, $content)
    {
        $db = DbConnect::getConnection();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?,  NOW())');
        $affectedLines = $newPost->execute(array($title, $content));
    }
}