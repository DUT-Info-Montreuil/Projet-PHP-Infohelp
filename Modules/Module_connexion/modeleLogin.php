<?php
require_once('Login.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");
class modeleLogin extends ConnexionUI
{
    public function __construct()
    {
    }
    public function add_log_in()
    {
        if (isset($_GET['token'] )|| !verification_token())
            return 1;

        if (isset($_POST["email"]) && isset($_POST["password"])) {

            if ($_POST["password"] == $_POST["motsDePasse2"]) {
                
            
            $lastname = htmlspecialchars($_POST["last_name"]);
            $firstname = htmlspecialchars($_POST["first_name"]);
            $email = htmlspecialchars($_POST["email"]);
            $passwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $postAdress = htmlspecialchars($_POST["postal_address"]);
            $city = htmlspecialchars($_POST["city"]);

            $verifEmailExistant = self::$bdd->prepare("SELECT * FROM `utilisateurs` WHERE `email` = '$email'");
            $verifEmailExistant->execute();

            if ($verifEmailExistant->rowCount() > 0) {
                echo"errerur l'email existe déjà";
            }else{

            $insert = self::$bdd->prepare('INSERT INTO `utilisateurs` (`last_name`, `first_name`, `email`, `password`, `postal_address`, `city`) VALUES (:par,:par2,:par3,:par4,:par5,:par6)');

            $insert->execute(array(':par' => $lastname, ':par2' => $firstname, ':par3' => $email, ':par4' => $passwd, ':par5' => $postAdress, ':par6' => $city));
            header("Location: index.php?Modules=Module_connexion&action=connexion");
            die();
            echo "Good registration \t";     
            }
            }else{
                echo"les mots de passe ne sont pas les mêmes.";
            }       
        } else {
            echo "Pas adjout";
        }

        
        return true;
    }
    public function connect()
    {
        if (isset($_GET['token'] )|| !verification_token())
            return 1;

        $recupuser = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `email` = ?');
        $recupuser->execute(array($_POST['email']));
        if (($tab = $recupuser->fetch()) === false) {
            throw new Exception("Error Processing Request", 1);
        }

        if (password_verify($_POST['password'], $tab['password'])) {
            if ($recupuser->rowCount() > 0) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['userID'] = $tab['userID'];
                $_SESSION['image']=$tab['image'];

                echo "utilisateur " . $_SESSION['email'] . " vous êtes bien connecté";
                header("Location: index.php?Modules=Module_accueil&action=Accueil");
                die();
            } else {
                echo "completer tous les champs ";
            }
        } else{
            header("Location: index.php?Modules=Module_connexion&action=connexion");
            die(); 
            echo "erreur de connexion";

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
        $userID=$_SESSION['userID'];
        $userEmail=$_SESSION['email'];
        $verifAncienMdp=$_SESSION['password'];

        $ancienMdp=strval($_POST["ancienMdp"]);
        $mdp1=strval($_POST["mdp1"]);
        $mdp2=strval($_POST["mdp2"]);
        if($mdp1!="" && $mdp2!=""){
            if ($ancienMdp==$verifAncienMdp) {

                if ($mdp1 == $mdp2) {
                    $_SESSION['password'] = $mdp1;
                    $nouveauMdp = password_hash($mdp1, PASSWORD_DEFAULT);
                    $update = self::$bdd->prepare("UPDATE `utilisateurs` SET `password`= '$nouveauMdp' WHERE `userID`= '$userID'");
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
            print_r($_FILES);
            $imageName = $_FILES["image"]["name"];
            $imageSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];
      
            // Image validation
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;
            $_SESSION['image']=$newImageName;
            $query = self::$bdd->prepare("UPDATE `utilisateurs` SET image = '$newImageName' WHERE userID = $userID");
            $query->execute();
            move_uploaded_file($tmpName, 'image_profil/' . $newImageName);
            echo"votre photo de profil a bien été modifié";

            
        }
        

        if (isset($_POST["btnChangerInfo"]) && isset($_POST["email"]) || isset($_POST["first_name"]) || isset($_POST["last_name"]) || isset($_POST["city"]) || isset($_POST["password"])|| isset($_POST["postal_address"])) {
            $lastname = htmlspecialchars($_POST["last_name"]);
            $firstname = htmlspecialchars($_POST["first_name"]);
            $email = htmlspecialchars($_POST["email"]);
            $postal_address = htmlspecialchars($_POST["postal_address"]);;
            $city = htmlspecialchars($_POST["city"]);
            $userID=$_SESSION['userID'];
            $userEmail=$_SESSION['email'];

            $verifEmailExistant = self::$bdd->prepare("SELECT * FROM `utilisateurs` WHERE `email` = '$email' and `email` !='$userEmail' ");
            $verifEmailExistant->execute();

            if ($verifEmailExistant->rowCount() > 0) {
                echo"errerur l'email existe déjà";
            }else{
                $update = self::$bdd->prepare("UPDATE `utilisateurs` SET `email`= '$email' , `first_name`= '$firstname' ,`last_name`= '$lastname' , `city`= '$city' , `postal_address`= '$postal_address' WHERE `userID`= '$userID'");
                $update->execute();
                $_SESSION['email']=$email;

            }
            }

            

    }

    public function log_out()
    {
        //echo $_SESSION['email'] . ", Vous êtes déconnecté sous l'userIDentifiant : " . $_SESSION['userID'];
        unset($_SESSION['userID']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header("Location: index.php?Modules=Module_connexion&action=connexion");
        die();
    }
}
