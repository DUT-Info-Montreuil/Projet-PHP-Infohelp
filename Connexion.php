
<?php
class ConnexionUI
{
        public static $bdd = null;

        public static function initConnexion()
        {

                //  $log = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201612;charset=utf8";
                //   $user = "dutinfopw201612";
                //  $pass = "rupapare";
                $log = "mysql:host=localhost;dbname=dutinfopw201612;charset=utf8";
                $user = "root";
                $pass = "";
                self::$bdd = new PDO($log, $user, $pass);
        }

        public static function getBDD() {
            return self::$bdd;
        }
}

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/