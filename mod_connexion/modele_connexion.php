<?php
require_once('connexion.php');

class ModeleConnexion extends ConnexionUSER
{
    public function __construct()
    {
    }


    public function ajout_donnees(){
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = $_POST["email"];
            $mdp= $_POST["password"];
            $passwordHash = password_hash($mdp,PASSWORD_DEFAULT);
            $requete=self::$bdd->prepare( 'INSERT INTO `utilisateurs`(`email`, `password`) VALUES (?,?)' );
            $requete->execute(array($email,$passwordHash));
            echo "Inscription faite";    
        }else{
            echo "Une erreur s'est produite !!";
        }
           // $bdd->prepare( 'INSERT INTO `tabletest`(`texte`) VALUES(?)' )->execute(array($text));    
    }

    public function connexion(){ 
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM `utilisateurs` WHERE `email` = '$email'";
            $requete = self::$bdd->query($sql);
            $tab= $requete->fetch();

            if(password_verify($password,$tab['password'])){
                $_SESSION['email'] = $tab['email'];
                echo "utilisateur " . $_SESSION['email'] . " vous etes bien connecté";
           }else{
           echo 'Veuillez completer tous les champs';
            }
        }
    }

   public function deconnexion(){
        unset($_SESSION['email']);
        echo "Déconnexion réusie";
    }
}
