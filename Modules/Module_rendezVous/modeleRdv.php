<?php
require_once('Login.php');
class modeleRdv extends ConnexionUI
{
    public function __construct()
    {
    }

    public function ajouterRdv()
    {
        if(isset($_POST['jour']) && isset($_POST['heure'])){
            echo"jour enregistré";
            $date=$_POST['jour'];
            $heure=$_POST['heure'];
            $insert = self::$bdd->prepare("INSERT INTO `rendezvous` (`horaire`, `DateRDV`,`idTechnicien`) VALUES (:par,:par2,:par3)");
            $insert->execute(array(':par' => $heure, ':par2' => $date,':par3' => '1'));
            echo"insertion de ".$date." ".$heure;

        }
        else{
            echo "erreur lors de l'insertion dans la BDD";
    
        }
    }
}
