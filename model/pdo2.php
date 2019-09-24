<?php
/**
 * Classe implémentant le singleton pour PDO* @author Savageman*/
classPDO2extendsPDO{
    privatestatic$_instance;
    /* Constructeur : héritage public obligatoire par héritage de PDO*/
    publicfunction__construct()
// End of PDO2::__construct() */
/* Singleton */
publicstaticfunctiongetInstance(){
    if(!isset(self::$_instance)){
        try{
            self::$_instance=newPDO('mysql:host=localhost;dbname=p4-blog;charset=utf8','root','');
        } catch(PDOException$e){
            echo$e;
        }
    }
    returnself::$_instance;
    }
    // End of PDO2::getInstance() */

}// end of file */