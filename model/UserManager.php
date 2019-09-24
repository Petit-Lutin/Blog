<?php
require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUser()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT pseudo, password, email FROM users WHERE email = ?');
        $req->execute(array());
        $user = $req->fetch();
        return $user;
    }
}