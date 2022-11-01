<?php
require_once('Login.php');
class modele_techniciens extends ConnexionUI
{

    public function getlistTechnicien(){
        if (isset($_POST["sub"])) {
            $str = $_POST["recherche"];
            $sth = self::$bdd->prepare("SELECT * FROM `techniciens` WHERE nom = '$str'");

            $sth->setFetchMode(PDO::FETCH_OBJ);
            $sth->execute();
        }
        return $sth;
    }
}

?>