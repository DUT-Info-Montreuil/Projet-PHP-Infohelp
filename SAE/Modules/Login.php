<?php
class ConnexionUI
{
    public static $bdd;

    public static function initConnexion()
    {

        $log = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201612";
        $user = "dutinfopw201612";
        $pass = "rupapare";       

        new PDO($log, $user, $pass);
    }
}