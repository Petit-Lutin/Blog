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
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }
}