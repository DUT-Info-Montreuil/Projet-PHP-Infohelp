<?php
require_once('Connexion.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");
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
            // header("Location: index.php?Modules=Module_achatEtVente&action=vente");
            die();
    }

    public function get_Nom($idMateriel){
        $requetNom = self::$bdd->prepare("SELECT nomMateriel FROM materiels WHERE `idMateriel`=$idMateriel");
        $requetNom->execute();
        $nomMateriel= $requetNom->fetch();
        return $nomMateriel[0];
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
        $idMateriel=$_POST['idMateriel'];
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
        print_r($_POST);
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
            $insert = self::$bdd->prepare("INSERT INTO `materiels` (`nomMateriel`, `quantite`, `description`, `marque`, `couleur`,`image`,`prix`) VALUES ('$nomMateriel','1','$description','$marque','$couleur','$newImageName','$prix')");

            $insert->execute();
            move_uploaded_file($tmpName, 'Modules/Module_achatEtVente/images_produits/' . $newImageName);

            // header("Location : index.php?Modules=Module_achatEtVente&action=boutique");
        }else{
            echo"erreur lors de la saisie du produit";
        }
        
    }

    public function envoiNotification($materiel)
    {
        $to = $_SESSION['email'];
        $subject = "Confirmation d'achat";
        $message = "Bonjour, votre achat de " . $materiel. " a bien été effectué. Veuillez voir avec le vendeur pour récupérer votre matériel !  ";
        $headers = "Content-Type: text/plain; charset=utf-8\r\n";
        $headers .= "From: infohelp93100@gmail.com\r\n";

        if(mail($to, $subject, $message, $headers))
            echo "Envoyé !";
        else
            echo "Erreur de l'envoi";
    } 
}