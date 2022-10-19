<?php
require_once('connexion.php');

class ModeleConnexion extends ConnexionUSER
{
    public function __construct()
    {
    }


    public function ajout_donnees(){
        if(isset($_POST["login"]) && isset($_POST["password"])){
            $login = $_POST["login"];
            $mdp= $_POST["password"];
            $passwordHash = password_hash($mdp,PASSWORD_DEFAULT);
            $requete=self::$bdd->prepare( 'INSERT INTO `tableUtilisateurs`(`login`, `password`) VALUES (?,?)' );
            $requete->execute(array($login,$passwordHash));
            echo "Inscription faite\n";    
        }else{
            echo "Une erreur s'est produite !!";
        }
           // $bdd->prepare( 'INSERT INTO `tabletest`(`texte`) VALUES(?)' )->execute(array($text));    
           
    }

    public function connexion(){ 
        if(isset($_POST["login"]) && isset($_POST["password"])){
            $login = $_POST["login"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM `tableUtilisateurs` WHERE `login` = '$login'";
            $requete = self::$bdd->query($sql);
            $tab= $requete->fetch();

            if(password_verify($password,$tab['password'])){
                $_SESSION['login'] = $tab['login'];
                echo "utilisateur " . $_SESSION['login'] . " vous etes bien connecté";
           }else{
           echo 'Vous n\'êtes pas inscrit';
            }
        }
    }

   public function deconnexion(){
    //cette fonction ne s'execute pas
        unset($_SESSION['login']);
        echo "Déconnexion réusie";
    }
}
