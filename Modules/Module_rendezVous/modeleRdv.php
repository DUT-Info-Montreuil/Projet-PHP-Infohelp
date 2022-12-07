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
            $insert = self::$bdd->prepare("INSERT INTO `rendezvous` (`horaire`, `DateRDV`,`idTechnicien`, `idUtilisateur`) VALUES (:par,:par2,:par3,:par4)");
            $insert->execute(array(':par' => $heure, ':par2' => $date,':par3' => $idTech, ':par4' => $_SESSION['userID']));
            echo"| rdv pris le ".$date." à ".$heure. " avec le technicien: ".$idTech;
            $this->envoiNotification($date,$heure);
        }
        else{
            echo "erreur lors de l'insertion dans la BDD";
    
        }
    }


    public function getListeRdv()
    {
        $iduser=$_SESSION['userID'];
        $requete = self::$bdd->prepare("SELECT * FROM `utilisateurs` inner join `rendezvous` on rendezvous.idUtilisateur=utilisateurs.userID inner join techniciens on techniciens.idTechnicien = rendezvous.idTechnicien WHERE idUtilisateur = '$iduser'");
        $requete->execute();
        $recupRdv=$requete->fetchAll();
        
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
        if(isset($_POST['choixNote'])){
            $idTechnicien=$_POST['idTechnicien'];

            $note=$_POST['choixNote'];
            $idRdv=$_POST['idRdv'];
            $this->ajoutNoteRdv($note,$idRdv,$idTechnicien);
            echo"note ajoutée";
        }
   
    }



    public function ajoutNoteRdv($note,$idRdv,$idTechnicien)
    {
            $requete = self::$bdd->prepare("UPDATE `rendezvous` SET note = '$note' WHERE idRdv = '$idRdv'");
            $requete->execute();
            $reqSelectNotes = self::$bdd->prepare("SELECT avg(note) FROM `rendezvous` WHERE idTechnicien = '$idTechnicien'");
            $reqSelectNotes->execute();
            $recupNotes=$reqSelectNotes->fetch();
            $somme=$recupNotes['avg(note)'];

            $requete = self::$bdd->prepare("UPDATE `techniciens` SET note = '$somme' WHERE idTechnicien = '$idTechnicien'");
            $requete->execute();
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



    public function envoiNotification($date,$heure)
    {
        $to = $_SESSION['email'];
        $subject = "Confirmation rendez-vous";
        $message = "Bonjour, votre rendez vous a bien été pris en compte.\nLe technicien se presentera donc à vous le ".$date ." à ". $heure." . A bientôt !  ";
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: infoHelp@gmail.com\r\n";

        if(mail($to, $subject, $message, $headers))
            echo "Envoyé !";
        else
            echo "Erreur de l'envoi du mail";
    }  



    public function getlistTechnicien()
    {
        //$str = $_POST["recherche"];
        //$idCat = $_POST["idCat"] where techniciens.idCategorie ='$idCat';
        $cat = $_POST["categorie"];
        $sth1 = self::$bdd->prepare("SELECT * FROM `techniciens` inner join `categories` on techniciens.idCategorie = categories.idCat where nomCat = '$cat'");
        $sth1->execute();
        $recuptech = $sth1->fetchAll();
        return $recuptech;
    }


    
    public function getCategories()
    {
        $sth = self::$bdd->prepare("SELECT * FROM `categories`");
        $sth->execute();
        $recupCate = $sth->fetchAll();
        return $recupCate;
    }


    public function getFavoris()
    {
        $requete = self::$bdd->prepare("SELECT DISTINCT * FROM `favoris` inner join `techniciens` on  favoris.idTechnicien = techniciens.idTechnicien ");
        $requete->execute();
        $recupFavoris=$requete->fetchAll();
        return $recupFavoris;
    }
}

