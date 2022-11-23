<?php
require_once('Login.php');
class modeleAdmin extends ConnexionUI
{
    public function __construct()
    {
    }
    public function verifAdmin()
    {
        $present = false;
        $req = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `admin` = 1');
        $req->execute();

        $present = true;


        return $present;
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
}
