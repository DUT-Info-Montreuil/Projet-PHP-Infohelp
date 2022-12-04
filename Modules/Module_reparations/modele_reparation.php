<?php
require_once('Login.php');
// require_once("Common/Bibliotheque_commune/Verification_creation_token.php");
class Modele_Reparation extends ConnexionUI
{
    public function __construct()
    {
    }

    public function getTraces(){
        $requete = self::$bdd->prepare("SELECT * FROM materiels;");
        $requete->execute();
        $data= $requete->fetchAll();
        return $data;
        print($data);
    }
}