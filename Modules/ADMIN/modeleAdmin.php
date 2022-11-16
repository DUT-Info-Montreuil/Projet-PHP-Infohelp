<?php
require_once('Login.php');
class modeleAdmin extends ConnexionUI
{
    public function __construct()
    {
    }
    public function getAdmin()
    {
        $req = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `admin` = 1');
        $req->execute();
        $nbr = $req->rowCount();
        return $nbr;
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
        if (isset($_POST['userID'])) {
            $iduser = $_POST['userID'];
            $delete = self::$bdd->prepare("DELETE FROM `utilisateurs` where first_name = '$iduser'");
            $delete->execute();
        }
    }
}
