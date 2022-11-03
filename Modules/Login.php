<?php
class ConnexionUI
{
    public static $bdd = null;

    public static function initConnexion()
    {

        $log = "mysql:host=localhost;dbname=dutinfopw201612";
        $user = "root";
        $pass = "";
        self::$bdd = new PDO($log, $user, $pass);
    }
}
