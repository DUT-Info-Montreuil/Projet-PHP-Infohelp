<?php
class ConnexionUI
{
    public static $bdd = null;

    public static function initConnexion()
    {

        $log = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201612";
        $user = "dutinfopw201612";
        $pass = "rupapare";

        self::$bdd = new PDO($log, $user, $pass);
    }
}