<?php
require_once('Login.php');
class modeleAchatEtVente extends ConnexionUI
{
    public function __construct()
    {
    }

    public function getListeMateriel(){
        $idMateriel=$_SESSION['userID'];
        $requete = self::$bdd->prepare("SELECT * FROM `materiels`");
        $requete->execute();
        $recupMateriels=$requete->fetchAll();
        
        return $recupMateriels;
    }
}
