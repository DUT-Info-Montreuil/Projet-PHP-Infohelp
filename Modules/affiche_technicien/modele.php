<?php
require_once('Login.php');
class modele_techniciens extends ConnexionUI
{

    public function getlistTechnicien(){
        if (isset($_POST["sub"])) {
            $str = $_POST["recherche"];
            $sth = self::$bdd->prepare("SELECT * FROM `techniciens` WHERE CONCAT (`idTechnicien`,`nom`,`prenom`,`idVille`,`avis`,`favoris`, `rayon d'activite`) LIKE'%".$str."%'");


            $tab = $sth->setFetchMode(PDO::FETCH_OBJ);
            //$sth->execute();
        }else{
            echo "ERROR value";
        }
        return $tab;
    }
}

?>