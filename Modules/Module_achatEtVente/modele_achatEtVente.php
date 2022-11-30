<?php
require_once('Login.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");
class modeleAchatEtVente extends ConnexionUI
{
    public function __construct()
    {
    }

    public function getListeMateriel(){
        $requete = self::$bdd->prepare("SELECT * FROM `materiels`");
        $requete->execute();
        $recupMateriels=$requete->fetchAll();
        return $recupMateriels;
    }

    public function acheterMateriel(){
            $idMateriel=$_POST['idMateriel'];
            $requete = self::$bdd->prepare("UPDATE `materiels` SET `quantite`= (`quantite`-1) WHERE `idMateriel`=$idMateriel");
            $requete->execute();
            $this->verif_quantite($idMateriel);
            header("Location: index.php?Modules=Module_achatEtVente&action=vente");
            die();
    }

    public function verif_quantite($idMateriel){
        $req_quantite =  self::$bdd->prepare("SELECT * FROM `materiels` WHERE idMateriel = $idMateriel and quantite='0'");
        $req_quantite->execute();
        if($req_quantite ->rowCount()>0){
            $requete = self::$bdd->prepare("DELETE FROM `materiels` WHERE `idMateriel` = '$idMateriel'");
            $requete->execute();
        }
    }
    public function get_Detail(){
        // if (!verification_token())
        // return 1;
        $idMateriel=$_POST['idMateriel'];
        $req_quantite =  self::$bdd->prepare("SELECT * FROM `materiels` WHERE idMateriel = $idMateriel");
        $req_quantite->execute();
        $res=$req_quantite->fetchAll();
        return $res;
    }
}