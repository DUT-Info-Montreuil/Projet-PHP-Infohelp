<?php
require_once('Login.php');
class modeleAdmin extends ConnexionUI
{
    public function __construct()
    {
    }
     public function afficheUser()
    {
        $requete = self::$bdd->prepare("SELECT * FROM `utilisateurs` where `userID` != 1 ");
        $requete->execute();
        $recup = $requete->fetchAll();
        return $recup;
    }
    public function suppUser()
    {
        if (isset($_POST['idUser'])) {
            $iduser = $_POST['idUser'];
            $delete = self::$bdd->prepare("DELETE FROM `utilisateurs` where `userID` = '$iduser'");
            $delete->execute();
        }
    }

    public function getlistTechnicien()
    {
        $str = $_POST["recherche"];
        $sth = self::$bdd->query("SELECT * FROM `techniciens` WHERE `nom` like '%$str%'");
        $sth->execute();


        $recuptech = $sth->fetchAll();

        return $recuptech;
    }
    public function afficherRdv (){
        $req = self::$bdd->prepare("SELECT * FROM `rendezvous` Where `idRdv` != 0 ");
        $req->execute();
        $affiche = $req->fetchAll();
        return $affiche;
        
    }
    public function suppRdv(){
        $rdv = $_POST['idRdv'];
        $del = self::$bdd->prepare("DELETE FROM `rendezvous` where `idRdv` = '%$rdv%'");
        $del->execute();
    }
}
