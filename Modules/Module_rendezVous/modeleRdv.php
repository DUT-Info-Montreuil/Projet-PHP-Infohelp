
<?php
require_once('Connexion.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once (ROOT.'/PHPMailer/PHPMailer.php');
require_once (ROOT.'/PHPMailer/SMTP.php');  
require_once (ROOT.'/PHPMailer/Exception.php');  

class modeleRdv extends ConnexionUI
{
    public function __construct()
    {
    }

    public function ajouterRdv()
    {
        if(isset($_POST['jour']) && isset($_POST['heure']) && isset($_POST['tec'])){
            $date=$_POST['jour'];
            $heure=$_POST['heure'];
            $idTech=$_POST['tec'];
            $idCategorie=$_POST['categorieRDV'];

            $insert = self::$bdd->prepare("INSERT INTO `rendezvous` (`horaire`, `DateRDV`,`idTechnicien`, `idUtilisateur`, `idCategorie`) VALUES (:par,:par2,:par3,:par4,:par5)");
            $insert->execute(array(':par' => $heure, ':par2' => $date, ':par3' => $idTech, ':par4' => $_SESSION['idUtilisateur'], ':par5' => $idCategorie));
            
            $this->envoiNotification($date, $heure);
            header("Location: index.php?Modules=Module_rendezVous&action=afficherListeRdv");
            die();
        } else {
            echo "erreur lors de l'insertion dans la BDD";
        }
    }


    public function getListeRdv()
    {
        $iduser=$_SESSION['idUtilisateur'];
        $requete = self::$bdd->prepare("SELECT * FROM `utilisateurs` inner join `rendezvous` on rendezvous.idUtilisateur=utilisateurs.idUtilisateur inner join techniciens on techniciens.idTechnicien = rendezvous.idTechnicien WHERE rendezvous.idUtilisateur = '$iduser'");
        $requete->execute();
        $recupRdv = $requete->fetchAll();

        return $recupRdv;
    }


    public function getRdv()
    {

        $idRDV=$_GET['idRdv'];
        $requete = self::$bdd->prepare("SELECT * FROM `utilisateurs` inner join `rendezvous` on rendezvous.idUtilisateur=utilisateurs.idUtilisateur inner join techniciens on techniciens.idTechnicien = rendezvous.idTechnicien WHERE idRdv = '$idRDV'");
        $requete->execute();
        $recupRdv=$requete->fetchAll();

        return $recupRdv;

    }




    public function annulerRdv($idRdv)
    {
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


// AVEC SERVEUR DE MAIL
    /*public function envoiNotification($date, $heure)
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
    } */


// SANS SERVEUR
    public function envoiNotification($date, $heure) {
        $websiteSupportMail = "infohelp93100montreuil@gmail.com";

        $mail = new PHPMailer;

        $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
        $mail->SMTPAuth = true; // Activer authentication SMTP
        $mail->Username = $websiteSupportMail; // Votre adresse email d'envoi
        $mail->Password = 'rgumuwxbvicmrmkz'; // Le mot de passe de cette adresse email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Accepter SSL
        $mail->Port = 465;

        $mail->setFrom($websiteSupportMail, 'InfoHelp'); // Personnaliser l'envoyeur
        $mail->addAddress($_SESSION['email']); // Ajouter le destinataire
        $mail->addReplyTo($websiteSupportMail, 'Information'); // L'adresse de réponse

        $mail->Subject = 'Confirmation de rendez-vous';
        $mail->Body = "Bonjour, votre rendez vous a bien été pris en compte.\nLe technicien se presentera à vous le ".$date ." à ". $heure." . A bientôt !  ";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo "Une erreur s'est produite, veuillez contacter un administrateur";
         } else {
            echo "</br> un mail vous a été envoyé !";
         }
    }



    public function getVilles()
    {
        $villes = self::$bdd->prepare("SELECT * FROM `ville`");
        $villes->execute();
        $recupVilles = $villes->fetchAll();
        return $recupVilles;
    }


    public function getTechnicienParVille()
    {
        if(isset($_POST["ville"]) && isset($_POST["uneVille"])){
            $ville = $_POST["ville"];
            $categorie = $_POST["categorie"];
            $ville = self::$bdd->prepare("SELECT * FROM `categories` inner join `techniciens` on categories.idCat = techniciens.idCategorie  inner join `ville` on techniciens.idVille = ville.idVille  where nomVille = '$ville' and nomCat='$categorie'");
            $ville->execute();
            $recuptech = $ville->fetchAll();
    
            return $recuptech;
        }else{
            $cat = $_POST["categorie"];
            $sth1 = self::$bdd->prepare("SELECT * FROM `techniciens` inner join `categories` on techniciens.idCategorie = categories.idCat where nomCat = '$cat'");
            $sth1->execute();
            $recuptech = $sth1->fetchAll();
            return $recuptech;
        }

    }

    
    public function getCategories()
    {
        $sth = self::$bdd->query("SELECT * FROM `categories`");
        $recupCategorie = $sth->fetchAll();
        return $recupCategorie;
    }


    public function getFavoris()
    {
        $idUtilisateur=$_SESSION['idUtilisateur'];
        $requetefav = self::$bdd->prepare("SELECT * FROM `favoris` INNER JOIN `techniciens` ON favoris.idTechnicien = techniciens.idTechnicien WHERE idUtilisateur='$idUtilisateur'");
        $requetefav->execute();
        $recupFav=$requetefav->fetchAll();
        return $recupFav;
    } 

    public function getTraces(){
        $requete = self::$bdd->prepare("SELECT * FROM materiels");
        $requete->execute();
        $data= $requete->fetchAll();
        return $data;
        print($data);
    }

}

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/