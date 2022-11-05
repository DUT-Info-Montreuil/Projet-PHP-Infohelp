<?php
require_once('Login.php');
class modeleTuto extends ConnexionUI
{
    public function __construct()
    {
    }

    public function get_categrorieVideo()
    {
        $requete = self::$bdd->prepare('SELECT * FROM `tutos`');
        $requete->execute();
        $recupCategorie=$requete->fetchAll();
        
        return $recupCategorie;
    }

    public function get_video()
    {
        $cat=$_GET["categorie"];
        echo "dd".$cat;
        $requete = self::$bdd->prepare("SELECT * FROM `tutos` where categorie=$cat");
        $requete->execute();
        $recupvideo=$requete->fetchAll();
        if ($requete->rowCount() > 0) {
            echo"reussi";
        }else{
            echo"erreur";
        }
        return $recupvideo;
    
    }
}

?>