<?php
require_once('Login.php');
class modeleLogin extends ConnexionUI
{
    public function __construct()
    {
    }
    public function add_log_in()
    {

        echo "login methode \t";


        if (isset($_POST["email"]) && isset($_POST["password"])) {            
            $lastname = htmlspecialchars($_POST["last_name"]);
            $firstname = htmlspecialchars($_POST["first_name"]);
            $email = htmlspecialchars($_POST["email"]);
            $passwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $city = htmlspecialchars($_POST["city"]);
            $postAdress = htmlspecialchars($_POST["postal_address"]);
            $insertUser = self::$bdd->prepare('INSERT INTO `utilisateurs` (`last_name`, `first_name`, `email`, `password`, `postal_address`, `city`, `mode`) VALUES (:par,:par2,:par3,:par4,:par5,:par6, :par7)');
            $insertUser->execute(array(':par' => $lastname, ':par2' => $firstname, ':par3' => $email, ':par4' => $passwd, ':par5' => $postAdress, ':par6' => $city, ':par7' => 0));
            $recupuser = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `email` = ? and `password` = ?');
            $recupuser->execute(array($email, $passwd));
            echo "Good registration \t";
        } else {
            echo "Pas adjout";
        }

        echo "Good registration \t";
        header("Location: index.php?Modules=Module_connexion&action=connexion");
        die();
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

                $_SESSION["mode"] = $tab["mode"];

                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['userID'] = $tab['userID'];
                echo "utilisateur " . $_SESSION['email'] . " vous êtes bien connecté";
                header("Location: index.php?Modules=Module_accueil&action=Accueil");
                die();
            } else {
                echo "completer tous les champs ";
            }
        } else {
            header("Location: index.php?Modules=Module_connexion&action=connexion");
            die();
            echo "erreur de connexion";
        }
    }

    public function log_out()
    {
        unset($_SESSION['userID']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['admin']);
        header("Location: index.php?Modules=Module_connexion&action=connexion");
        die();
    }
}
