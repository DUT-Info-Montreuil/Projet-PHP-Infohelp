<?php
require_once('Login.php');
class modele_techniciens extends ConnexionUI
{

    public function getlistTechnicien(){
        if (isset($_POST["sub"])) {
            $str = $_POST["recherche"];
            $sth = self::$bdd->query("SELECT * FROM `techniciens` WHERE `nom` = $str");


            
            //$sth->execute();
        }else{
            echo "ERROR value";
        }
        return $sth;
    }
}

?>