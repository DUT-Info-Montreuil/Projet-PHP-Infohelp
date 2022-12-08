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
}
