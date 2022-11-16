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

    public function acheterMateriel(){
        if(isset($_POST['acheter'])){
            $idMateriel=$_SESSION['idMateriel'];
            $requete = self::$bdd->prepare("UPDATE `materiels` SET 'quantite'= 'quantite'."-1 . "WHERE idMateriel='$idMateriel'");
            $requete->execute();
            $recupMateriel=$requete->fetchAll();
            
            return $recupMateriel;
        }
    }
}
