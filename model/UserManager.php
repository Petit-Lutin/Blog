<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUser($userEmail)
    {
        $db=DbConnect::getConnection();
        $req = $db->prepare('SELECT pseudo, password, email FROM users WHERE email = ?');
        $req->execute([$userEmail]);
        $user = $req->fetch();

        return $user;
    }
}