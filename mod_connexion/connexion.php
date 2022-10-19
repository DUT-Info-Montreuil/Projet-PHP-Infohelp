<?php
class ConnexionUSER {

    protected static $bdd=NULL;

    public function __construct(){
    }


    public static function initConnexion(){
        $bd = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201612";
        $username = "dutinfopw201612";
        $passdatabase = "rupapare";
        self::$bdd = new PDO($bd, $username, $passdatabase);
}


}

?>