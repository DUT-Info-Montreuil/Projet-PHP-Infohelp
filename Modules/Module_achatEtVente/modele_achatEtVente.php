<?php
require_once('Login.php');
class modeleAchatEtVente extends ConnexionUI
{
    public function __construct()
    {
    }

    public function getListeMateriel(){
        $requete = self::$bdd->prepare("SELECT * FROM `materiels` WHERE `quantite`");
        $requete->execute();
        $recupMateriels=$requete->fetchAll();
        return $recupMateriels;
    }

    public function acheterMateriel(){
            $idMateriel=$_POST['idMateriel'];
            $req_quantite =  self::$bdd->prepare("SELECT `quantite` FROM `materiels` WHERE idMateriel = $idMateriel");
            $quantite = $req_quantite->execute();    
            $requete = self::$bdd->prepare("UPDATE `materiels` SET `quantite`= (`quantite`-1) WHERE idMateriel='$idMateriel'");
            $requete->execute();
            $this->verif_quantite($idMateriel);
            header("Location: index.php?Modules=Module_achatEtVente&action=vente");
            die();
    }

    public function verif_quantite($idMateriel){
        $req_quantite =  self::$bdd->prepare("SELECT `quantite` FROM `materiels` WHERE idMateriel = $idMateriel");
        $req_quantite->execute();
        $res=$req_quantite->fetch();
        if($res == "0"){
            $requete = self::$bdd->prepare("DELETE FROM `materiels` WHERE `idMateriel` = '$idMateriel'");
            $requete->execute();
        }
    }
}



