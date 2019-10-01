<?php
require_once("model/Manager.php");

//if (!isset($_SESSION)) {
//    session_start();
//}
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