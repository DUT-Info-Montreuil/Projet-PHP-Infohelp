<?php
require_once('Connexion.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once (ROOT.'/PHPMailer/PHPMailer.php');
require_once (ROOT.'/PHPMailer/SMTP.php');  
require_once (ROOT.'/PHPMailer/Exception.php');  

class modeleAchatEtVente extends ConnexionUI
{
    public function __construct()
    {
    }

    public function getListeMateriel(){
        $requete = self::$bdd->prepare("SELECT * FROM `materiels`");
        $requete->execute();
        $recupMateriels=$requete->fetchAll();
        return $recupMateriels;
    }

    public function acheterMateriel(){
            $idMateriel=$_GET['id'];
            $requete = self::$bdd->prepare("UPDATE `materiels` SET `quantite`= (`quantite`-1) WHERE `idMateriel`=$idMateriel");
            $requete->execute();
            $this->envoiNotification($this->get_Nom($idMateriel));
            $this->verif_quantite($idMateriel);

    }

    public function get_Nom($idMateriel){
        $requetNom = self::$bdd->prepare("SELECT nomMateriel, vendeur FROM materiels WHERE `idMateriel`=$idMateriel");
        $requetNom->execute();
        $nomMateriel= $requetNom->fetch();
        return $nomMateriel;
    }

    public function verif_quantite($idMateriel){
        $req_quantite =  self::$bdd->prepare("SELECT * FROM `materiels` WHERE idMateriel = $idMateriel and quantite='0'");
        $req_quantite->execute();
        if($req_quantite ->rowCount()>0){
            $requete = self::$bdd->prepare("DELETE FROM `materiels` WHERE `idMateriel` = '$idMateriel'");
            $requete->execute();
        }
    }
    public function get_Detail(){
        $idMateriel=$_GET['idMateriel'];
        $req_quantite =  self::$bdd->prepare("SELECT * FROM `materiels` WHERE idMateriel = $idMateriel");
        $req_quantite->execute();
        $res=$req_quantite->fetchAll();
        return $res;
    }

    public function ajoutProduit(){
        if (isset($_GET['token'] )|| !verification_token())
            return 1;
        
        $nomMateriel=$_POST['nomMateriel'];
        $description=$_POST['description'];
        $marque=$_POST['marque'];
        $couleur=$_POST['couleur'];
        $prix=$_POST['prix'];
        $vendeur=$_SESSION['nom'];

        if(isset($_FILES["image"]["name"])){
            $imageName = $_FILES["image"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];
      
            // Image validation
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $insert = self::$bdd->prepare("INSERT INTO `materiels` (`nomMateriel`, `quantite`, `description`, `marque`, `couleur`,`image`,`prix`,`vendeur`) VALUES ('$nomMateriel','1','$description','$marque','$couleur','$newImageName','$prix','$vendeur')");

            $insert->execute();
            move_uploaded_file($tmpName, 'Modules/Module_achatEtVente/images_produits/' . $newImageName);

            echo"votre produit a bien été mis en vente";

        }else{
            echo"erreur lors de la saisie du produit";
        }
        
    }


    // AVEC SERVEUR
    // public function envoiNotification($materiel)
    // {
    //     $to = $_SESSION['email'];
    //     $subject = "Confirmation d'achat";
    //     $message = "Bonjour, votre achat de " . $materiel. " a bien été effectué. Veuillez voir avec le vendeur pour récupérer votre matériel !  ";
    //     $headers = "Content-Type: text/plain; charset=utf-8\r\n";
    //     $headers .= "From: infohelp93100@gmail.com\r\n";

    //     if(mail($to, $subject, $message, $headers))
    //         echo "Un mail vous a été envoyé !";
    //     else
    //         echo "Erreur de l'envoi";
    // } 

    // SANS SERVEUR
    public function envoiNotification($materiel) {
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

        $mail->Subject = 'Confirmation d\'achat';
        $mail->Body = "Bonjour, votre achat de " . $materiel[0]. " a bien été effectué. Veuillez voir avec le vendeur " .$materiel[1]." pour récupérer votre matériel !  ";  

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo "Une erreur s'est produite, veuillez contacter un administrateur";
         } else {
            echo "Mail envoyé !";
         }
    }
}