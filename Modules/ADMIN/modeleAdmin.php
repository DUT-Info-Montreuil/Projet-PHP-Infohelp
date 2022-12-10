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
    public function suppUtilisateur()
    {
        if (isset($_GET['id'])) {
            $idUtilisateur = $_GET['id'];
            $delete = self::$bdd->prepare("DELETE FROM `utilisateurs` where `userID` = '$idUtilisateur'");
            $delete->execute();
            echo"Suppression effectuée!";
        }

    }

    public function suppTechnicien()
    {
        if (isset($_GET['id'])) {
            $idtech = $_GET['id'];
            $delete = self::$bdd->prepare("DELETE FROM `techniciens` where `idTechnicien` = '$idtech'");
            $delete->execute();
            echo"Suppression effectuée!";
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
        $req = self::$bdd->prepare("SELECT * FROM `rendezvous` inner join `techniciens` on rendezvous.idTechnicien = techniciens.idTechnicien  Where `idRdv` != 0 ");
        $req->execute();
        $affiche = $req->fetchAll();
        return $affiche;
        
    }
}
