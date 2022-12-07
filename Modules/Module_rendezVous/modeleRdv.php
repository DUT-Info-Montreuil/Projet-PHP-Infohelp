<?php
require_once('Login.php');
class modeleRdv extends ConnexionUI
{
    public function __construct()
    {
    }

    public function ajouterRdv()
    {
        echo "var dump" . var_dump($_POST['tec']);
        if (isset($_POST['jour']) && isset($_POST['heure']) && isset($_POST['tec'])) {
            echo "jour enregistré";
            $date = $_POST['jour'];
            $heure = $_POST['heure'];
            $idTech = $_POST['tec'];
            $insert = self::$bdd->prepare("INSERT INTO `rendezvous` (`horaire`, `DateRDV`,`idTechnicien`, `idUtilisateur`) VALUES (:par,:par2,:par3,:par4)");
            $insert->execute(array(':par' => $heure, ':par2' => $date, ':par3' => $idTech, ':par4' => $_SESSION['userID']));
            echo "insertion de " . $date . " " . $heure . " tec:" . $idTech;
            $this->envoiNotification($date, $heure);
        } else {
            echo "erreur lors de l'insertion dans la BDD";
        }
    }

    public function getListeRdv()
    {
        $iduser = $_SESSION['userID'];
        $requete = self::$bdd->prepare("SELECT * FROM `rendezvous` inner join `utilisateurs` on rendezvous.idUtilisateur=utilisateurs.userID WHERE idUtilisateur = '$iduser'");
        $requete->execute();
        $recupRdv = $requete->fetchAll();

        return $recupRdv;
    }

    public function annulerRdv()
    {
        if (isset($_POST['idRdv'])) {
            $idRdv = $_POST['idRdv'];
            echo $idRdv;
            $delete = self::$bdd->prepare("DELETE FROM `rendezvous` WHERE idRdv='$idRdv'");
            $delete->execute();
            echo "suppression effectuée";
        } else {
            echo "erreur lors de l'execution de la requete SQL";
        }
    }


    public function envoiNotification($date, $heure)
    {
        $to = $_SESSION['email'];
        $subject = "Confirmation rendez-vous";
        $message = "Bonjour, votre rendez vous a bien été pris en compte.\nNous vous attendons donc le " . $date . " à " . $heure . " dans nos locaux. A bientôt !  ";
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: infoHelp@gmail.com\r\n";

        if (mail($to, $subject, $message, $headers))
            echo "Envoyé !";
        else
            echo "Erreur de l'envoi";
    }

    public function getTechnicienParVille()
    {
        $ville = $_POST["city"];
        $ville = self::$bdd->prepare("SELECT * FROM `techniciens` inner join `ville` on techniciens.idVille = ville.idVille where nomVille = '$ville'");
        $ville->execute();
        $recuptech = $ville->fetchAll();
        return $recuptech;
    }
    public function getlistTechnicien()
    {

        $cat = $_POST["categorie"];
        $sth1 = self::$bdd->prepare("SELECT * FROM `techniciens` inner join `categories` on techniciens.idCategorie = categories.idCat where idCat = '$cat'");
        $sth1->execute();
        $recuptech = $sth1->fetchAll();
        return $recuptech;
    }

    public function getCategories()
    {
        $sth = self::$bdd->query("SELECT * FROM `categories`");
        return $sth;
    }
}
