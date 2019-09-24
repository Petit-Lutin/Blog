<?php
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts($page=0) //
    {
//        if ((isset($_GET['page'])) & (is_integer($_GET['page']))) {
//            $page = $_GET['page'];
//        } else {
//            $page = 0;
//        }

//        $page = $_GET['page'];
//echo $page;
//die();
        $db = $this->dbConnect();

        $offset = $page * 5; //pour savoir quel est l'article le plus bas affiché sur la page, avec 5 articles par page

//        echo 'offset : ' . $offset;

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


//echo $page.'manager';
//die();
        // écrit en ternaire       $page = (isset($page)) & (is_integer($page)) ? $_GET['page'] : 0;
//        return ['posts' => $req, 'pageNb' => $pageNb];

    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, slug FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    //public function editPost($title, $content)
    //{
    //    $db = $this->dbConnect();
    //     $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    //    $updatedPost = $db->prepare('UPDATE title, content FROM posts WHERE id = ?');
    //     $affectedLines = $updatedPost->execute(array($title, $content));

    // }

    public function updatePost($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE posts set title=?, content=? WHERE id = ?');
        $affectedLines = $post->execute(array($title, $content, $postId));
    }

    public function addPost($title, $content)
    {
        $db = $this->dbConnect();
        $newPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?,  NOW())');
        $affectedLines = $newPost->execute(array($title, $content));
    }


    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=p4-blog;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set Errorhandling to Exception
        return $db;
    }
}