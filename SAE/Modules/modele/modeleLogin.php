<?php
require_once('Modules/Login.php');
class modeleLogin extends ConnexionUI
{
    public function __construct()
    {
    }
    public function add_log_in()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = htmlspecialchars($_POST["email"]);
            $passwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $insert = self::$bdd->prepare('INSERT INTO `utilisateurs` (`email`, `password`) VALUES (:par,:par2)');
            $insert->execute(array(':par' => $email, ':par2' => $passwd));

            $recupuser = self::$bdd->prepare('SELECT * FROM `utilisateurs` WHERE `email` = ? and `password` = ?');
            $recupuser->execute(array($email, $passwd));


            if ($recupuser->rowCount() > 0) {
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $passwd;
                $_SESSION["userID"] = $recupuser->fetch()['userID'];
            }
        } else {
            echo "Pas adjout";
        }
        echo "Good registration \t";
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
    }
}
