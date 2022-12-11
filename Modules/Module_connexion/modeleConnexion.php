<?php
require_once('Connexion.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");
class modeleConnexion extends ConnexionUI
{
    public function __construct()
    {
    }
    public function inscription()
    {
        if (isset($_GET['token'] )|| !verification_token())
            return 1;

        if (isset($_POST["email"]) && isset($_POST["mot_de_passe"])) {

            if ($_POST["mot_de_passe"] == $_POST["motsDePasse2"]) {
                
            
            $lastname = htmlspecialchars($_POST["nom"]);
            $firstname = htmlspecialchars($_POST["prenom"]);
            $email = htmlspecialchars($_POST["email"]);
            $passwd = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
            $postAdress = htmlspecialchars($_POST["adresse_postale"]);
            $city = htmlspecialchars($_POST["ville"]);

            $verifEmailExistant = self::$bdd->prepare("SELECT * FROM `utilisateurs` WHERE `email` = '$email'");
            $verifEmailExistant->execute();

            if ($verifEmailExistant->rowCount() > 0) {
                echo"erreur l'email existe déjà";
            }else{

            $insert = self::$bdd->prepare('INSERT INTO `utilisateurs` (`nom`, `prenom`, `email`, `mot_de_passe`, `adresse_postale`, `ville`) VALUES (:par,:par2,:par3,:par4,:par5,:par6)');

            $insert->execute(array(':par' => $lastname, ':par2' => $firstname, ':par3' => $email, ':par4' => $passwd, ':par5' => $postAdress, ':par6' => $city));
            header("Location: index.php?Modules=Module_connexion&action=form_connexion");
            die();
            echo "Good registration \t";     
            }
            }else{
                echo"les mots de passe ne sont pas les mêmes.(modele connexion methode inscription)";
            }       
        } else {
            echo "Pas adjout";
        }

        
        return true;
    }
    public function connexion()
    {
        if (isset($_GET['token'] )|| !verification_token())
            return 1;

        $recupuser = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `email` = ?');
        $recupuser->execute(array($_POST['email']));
        if (($tab = $recupuser->fetch()) === false) {
            return 1;
        }else{

        if (password_verify($_POST['mot_de_passe'], $tab['mot_de_passe'])) {
            if ($recupuser->rowCount() > 0) {

                $_SESSION["mode"] = $tab["mode"];

                $_SESSION['email'] = $_POST['email'];
                $_SESSION['mot_de_passe'] = $_POST['mot_de_passe'];
                $_SESSION['idUtilisateur'] = $tab['idUtilisateur'];
                $_SESSION['image']=$tab['image'];

                return 0;
            } else {
                return 1;
            }
        } else{

            return 1;

            ?> 
            <?php 
        }
    }
    }

    public function getUtilisateur()
    {
        $email=$_SESSION['email'];
        $recupuser = self::$bdd->prepare("SELECT * FROM `utilisateurs` WHERE `email` = '$email'");
        $recupuser->execute();
        $user=$recupuser->fetch();
        return $user;
    }

    public function modifInformationsUtilisateur()
    {
        if (isset($_GET['token'] )|| !verification_token())
            return 1;

        $userID=$_SESSION['idUtilisateur'];
        $userEmail=$_SESSION['email'];
        $verifAncienMdp=$_SESSION['mot_de_passe'];

        $ancienMdp=strval($_POST["ancienMdp"]);
        $mdp1=strval($_POST["mdp1"]);
        $mdp2=strval($_POST["mdp2"]);
        if($mdp1!="" && $mdp2!=""){
            if ($ancienMdp==$verifAncienMdp) {

                if ($mdp1 == $mdp2) {
                    $_SESSION['mot_de_passe'] = $mdp1;
                    $nouveauMdp = password_hash($mdp1, PASSWORD_DEFAULT);
                    $update = self::$bdd->prepare("UPDATE `utilisateurs` SET `mot_de_passe`= '$nouveauMdp' WHERE `idUtilisateur`= '$userID'");
                    $update->execute();
                    echo"votre mot de passe a bien été modifié";

                }else{
                    var_dump($mdp1);
                    var_dump($mdp2);
                    echo"erreur les mots de passe ne sont pas identiques";
                }

        }else{
            var_dump($ancienMdp);
            echo"erreur lors de la saisie de l'ancien mdp";
        }
        }
        
        if(isset($_FILES["image"]["name"]) && $_FILES["image"]["error"]!=4){
            
            $imageName = $_FILES["image"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];
      
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $_SESSION['image']=$newImageName;
            $query = self::$bdd->prepare("UPDATE `utilisateurs` SET image = '$newImageName' WHERE idUtilisateur = $userID");
            $query->execute();
            move_uploaded_file($tmpName, 'Modules/image_profil/' . $newImageName);


            
        }
        

        if (isset($_POST["btnChangerInfo"]) && isset($_POST["email"]) || isset($_POST["prenom"]) || isset($_POST["nom"]) || isset($_POST["ville"]) || isset($_POST["mot_de_passe"])|| isset($_POST["adresse_postale"])) {
            $lastname = htmlspecialchars($_POST["nom"]);
            $firstname = htmlspecialchars($_POST["prenom"]);
            $email = htmlspecialchars($_POST["email"]);
            $postal_address = htmlspecialchars($_POST["adresse_postale"]);;
            $city = htmlspecialchars($_POST["ville"]);
            $userID=$_SESSION['idUtilisateur'];
            $userEmail=$_SESSION['email'];

            $verifEmailExistant = self::$bdd->prepare("SELECT * FROM `utilisateurs` WHERE `email` = '$email' and `email` !='$userEmail' ");
            $verifEmailExistant->execute();

            if ($verifEmailExistant->rowCount() > 0) {
                echo"errerur l'email existe déjà";
            }else{
                $update = self::$bdd->prepare("UPDATE `utilisateurs` SET `email`= '$email' , `prenom`= '$firstname' ,`nom`= '$lastname' , `ville`= '$city' , `adresse_postale`= '$postal_address' WHERE `idUtilisateur`= '$userID'");
                $update->execute();
                $_SESSION['email']=$email;

            }
            }

            

    }


    public function deconnexion()
    {
        unset($_SESSION['idUtilisateur']);
        unset($_SESSION['email']);
        unset($_SESSION['mot_de_passe']);
        unset($_SESSION['mode']);
        unset($_SESSION['image']);

        header("Location: index.php?Modules=Module_connexion&action=form_connexion");
        die();
    }
}
