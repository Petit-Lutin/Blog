<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUser()
    {
        $db=DbConnect::getConnection();
        $req = $db->prepare('SELECT pseudo, password, email FROM users WHERE email = ?');
        $req->execute();
        $user = $req->fetch();
        return $user;
    }
}