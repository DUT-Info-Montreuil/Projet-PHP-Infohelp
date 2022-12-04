<?php
require_once('Login.php');
class modeleLogin extends ConnexionUI
{
    public function __construct()
    {
    }
    public function add_log_in()
    {

        if (isset($_POST["email"]) && isset($_POST["password"])) {
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

        } else {
            echo "Pas adjout";
        }

        
        return true;
    }
    public function connect()
    {
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
            $_SESSION['image']=$newImageName;
            $query = self::$bdd->prepare("UPDATE `utilisateurs` SET image = '$newImageName' WHERE userID = $userID");
            $query->execute();
            move_uploaded_file($tmpName, 'image_profil/' . $newImageName);

            
        }
        
        if(isset($_POST["changeMdpBtn"]) && isset($_POST["mdp1"])&&isset($_POST["mdp2"])){
            if ($_POST['mdp1'] == $_POST['mdp2']) {
                $mdp1=$_POST["mdp1"];
                $nouveauMdp = password_hash($mdp1, PASSWORD_DEFAULT);
                $update = self::$bdd->prepare("UPDATE `utilisateurs` SET `password`= '$nouveauMdp' WHERE `userID`= '$userID'");
                $update->execute();
            }
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
            header("Location: index.php?Modules=Module_connexion&action=monProfil");
            die;

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
