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
            $postAdress = 0;
            $city = 0;
            $insert = self::$bdd->prepare('INSERT INTO `utilisateurs` (`last_name`, `first_name`, `email`, `password`, `postal_address`, `city`) VALUES (:par,:par2,:par3,:par4,:par5,:par6)');

            $insert->execute(array(':par' => $lastname, ':par2' => $firstname, ':par3' => $email, ':par4' => $passwd, ':par5' => $postAdress, ':par6' => $city));
            $recupuser = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `email` = ? and `password` = ?');
            $recupuser->execute(array($email, $passwd));
            echo "Good registration \t";


            /*  if ($recupuser->rowCount() > 0) {
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $passwd;
                $_SESSION["userID"] = $recupuser->fetch()['userID'];
            } */
        } else {
            echo "Pas adjout";
        }
        echo "Good registration \t";
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
            } else {
                echo "completer tous les champs ";
            }
        } else
            echo "boolean ";
    }
    public function log_out()
    {
        echo $_SESSION['email'] . ", Vous êtes déconnecté sous l'userIDentifiant : " . $_SESSION['userID'];
        unset($_SESSION['userID']);
        unset($_SESSION['email']);
    }
}
