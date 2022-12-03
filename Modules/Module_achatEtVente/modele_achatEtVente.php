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
            $this->verif_quantite($idMateriel);
            $requete->execute();
            $this->envoiNotification($this->get_Nom());
            // header("Location: index.php?Modules=Module_achatEtVente&action=vente");
            die();
    }

    public function get_Nom(){
        $idMateriel=$_POST['idMateriel'];
        $requetNom = self::$bdd->prepare("SELECT nomMateriel FROM materiels WHERE `idMateriel`=$idMateriel");
        $requetNom->execute();
        $nomMateriel= $requetNom->fetch();
        return $nomMateriel;
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

    public function envoiNotification($materiel)
    {
        $to = $_SESSION['email'];
        $subject = "Confirmation d'achat";
        $message = "Bonjour, votre achat de " . $materiel. " a bien été effectué. Veuillez voir avec le vendeur pour récupérer votre matériel !  ";
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: infohelp93100@gmail.com\r\n";

        if(mail($to, $subject, $message, $headers))
            echo "Envoyé !";
        else
            echo "Erreur de l'envoi";
    } 
}