<?php
require_once('model/config.php'); // contient les identifiants de la base de données, identifiant et mot de passe du serveur

/**
 * Classe pour la connexion à la base de données : si aucune connexion n'est établie, on en crée une, autrement on n'en crée pas
*/
class DbConnect
{
    protected static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = new PDO(CONFIG['host'], CONFIG['username'], CONFIG['password']);
//            self::$connection = new PDO('mysql:host=localhost;dbname=p4-blog;charset=utf8', 'root', '');
        }
        return self::$connection;
    }
}
//protected function dbConnect()
//{
//    $db = new PDO('mysql:host=localhost;dbname=p4-blog;charset=utf8', 'root', '');
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set Errorhandling to Exception //todo afficher les erreurs ?
//    return $db;
//}