<?php
class ConnexionUSER {

    protected static $bdd=NULL;

    public function __construct(){
    }


/*    public static function initConnexion(){
        $bd="mysql:host=localhost;dbname=ggermana";
        $username="ggermana";
        $mdpdb="ovDx78reG.19011999y";
        self::$bdd=new PDO($bd,$username,$mdpdb);
    }
 */
    public static function initConnexion(){
        $bd = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201615";
        $username = "dutinfopw201615";
        $passdatabase = "pymazubu";
        self::$bdd = new PDO($bd, $username, $passdatabase);
}


}

?>