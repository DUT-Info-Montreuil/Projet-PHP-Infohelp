<?php
require_once('Login.php');
class modeleRdv extends ConnexionUI
{
    public function __construct()
    {
    }

    public function ajouterRdv()
    {
        if(isset($_POST['jour']) && isset($_POST['heure']) && isset($_POST['tec'])){
            echo"rdv enregistré ";
            $date=$_POST['jour'];
            $heure=$_POST['heure'];
            $idTech=$_POST['tec'];
            $idCategorie=$_POST['categorieRDV'];

            $insert = self::$bdd->prepare("INSERT INTO `rendezvous` (`horaire`, `DateRDV`,`idTechnicien`, `idUtilisateur`, `idCategorie`) VALUES (:par,:par2,:par3,:par4,:par5)");
            $insert->execute(array(':par' => $heure, ':par2' => $date, ':par3' => $idTech, ':par4' => $_SESSION['userID'], ':par5' => $idCategorie));
            echo "rdv enregistré pour le " . $date . " à " . $heure;
            $this->envoiNotification($date, $heure);
        } else {
            echo "erreur lors de l'insertion dans la BDD";
        }
    }


    public function getListeRdv()
    {
        $iduser=$_SESSION['userID'];
        $requete = self::$bdd->prepare("SELECT * FROM `utilisateurs` inner join `rendezvous` on rendezvous.idUtilisateur=utilisateurs.userID inner join techniciens on techniciens.idTechnicien = rendezvous.idTechnicien WHERE idUtilisateur = '$iduser'");
        $requete->execute();
        $recupRdv = $requete->fetchAll();

        return $recupRdv;
    }


    public function getRdv()
    {

        $idRDV=$_POST['idRdv'];
        $requete = self::$bdd->prepare("SELECT * FROM `utilisateurs` inner join `rendezvous` on rendezvous.idUtilisateur=utilisateurs.userID inner join techniciens on techniciens.idTechnicien = rendezvous.idTechnicien WHERE idRdv = '$idRDV'");
        $requete->execute();
        $recupRdv=$requete->fetchAll();

        return $recupRdv;

    }




    public function annulerRdv($idRdv)
    {
            $idRdv=$_POST['idRdv'];
            $delete = self::$bdd->prepare("DELETE FROM `rendezvous` WHERE idRdv='$idRdv'");
            $delete->execute();
            echo"suppression effectuée";
    }



    public function modifRdv()
    {
        if(isset($_POST['boutonAnnuler'])){
            $idRdv=$_POST['idRdv'];
            $this->annulerRdv($idRdv);
        }
        if(isset($_POST['MettreFavoris'])){
            $idTechnicien=$_POST['idTechnicien'];
            $idUtilisateur=$_POST['idUtilisateur'];

            $this->ajoutFavoris($idTechnicien,$idUtilisateur);
        }
        if(isset($_POST['choixNote'])&&($_POST['choixNote']!='')){
            $note=$_POST['choixNote'];
            $idRdv=$_POST['idRdv'];
            $this->ajoutNoteRdv($note,$idRdv);
        }
        else{
            echo "erreur inserez une note inferieur ou egale a 5";
        }    

        header("Location: index.php?Modules=Module_connexion&action=monProfil");
        die();
    }



    public function ajoutNoteRdv($note,$idRdv)
    {
            $idTech=$_POST['idTechnicien'];
            $requete = self::$bdd->prepare("UPDATE `rendezvous` SET note = '$note' WHERE idRdv = '$idRdv'");
            $requete->execute();
            $requeteTech = self::$bdd->prepare("SELECT avg(note) FROM `rendezvous` WHERE idTechnicien = '$idTech'");
            $requeteTech->execute();
            $moyenne=$requeteTech->fetch();
            $requete = self::$bdd->prepare("UPDATE `techniciens` SET note = '$moyenne[0]' WHERE idTechnicien = '$idTech'");
            $requete->execute();

            echo"note ajoutée au rdv: ".$idRdv;
    }



    public function ajoutFavoris($idTechnicien,$idUtilisateur)
    {
        $requetefavExistant = self::$bdd->prepare("SELECT * FROM `favoris` WHERE idTechnicien = '$idTechnicien' AND idUtilisateur='$idUtilisateur'");
        $requetefavExistant->execute();
        if($requetefavExistant -> rowCount() > 0) {
            echo "ce technicien est déjà dans vos favoris";
        }else{
            $insert = self::$bdd->prepare("INSERT INTO `favoris` (`idTechnicien`, `idUtilisateur`) VALUES (:par,:par2)");
            $insert->execute(array(':par' => $idTechnicien, ':par2' => $idUtilisateur));
        }
}



    public function envoiNotification($date, $heure)
    {
        $to = $_SESSION['email'];
        $subject = "Confirmation rendez-vous";
        $message = "Bonjour, votre rendez vous a bien été pris en compte.\nLe technicien se presentera donc à vous le ".$date ." à ". $heure." . A bientôt !  ";
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: infohelp93100Montreuil@gmail.com\r\n";

        if (mail($to, $subject, $message, $headers))
            echo "Envoyé !";
        else
            echo "Erreur de l'envoi du mail";
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
        echo"ikhn".var_dump($cat);
        $sth1 = self::$bdd->prepare("SELECT * FROM `techniciens` inner join `categories` on techniciens.idCategorie = categories.idCat where nomCat = '$cat'");
        $sth1->execute();
        $recuptech = $sth1->fetchAll();
        return $recuptech;
    }


    
    public function getCategories()
    {
        $sth = self::$bdd->query("SELECT * FROM `categories`");
        $recupCategorie = $sth->fetchAll();
        return $recupCategorie;
    }


    public function getFavoris()
    {
        $idUtilisateur=$_SESSION['userID'];
        $requetefav = self::$bdd->prepare("SELECT * FROM `favoris` INNER JOIN `techniciens` ON favoris.idTechnicien = techniciens.idTechnicien WHERE idUtilisateur='$idUtilisateur'");
        $requetefav->execute();
        $recupFav=$requetefav->fetchAll();
        return $recupFav;
    } 

    public function getStats()
    {
        $idUtilisateur=$_SESSION['userID'];
        $requetefav = self::$bdd->prepare("SELECT * FROM `favoris` INNER JOIN `techniciens` ON favoris.idTechnicien = techniciens.idTechnicien WHERE idUtilisateur='$idUtilisateur'");
        $requetefav->execute();
        $recupFav=$requetefav->fetchAll();
        return $recupFav;
    } 

}

