<?php
require_once('Login.php');
class modeleTuto extends ConnexionUI
{
    public function __construct()
    {
    }

    public function get_categrorieVideo()
    {
        $requete = self::$bdd->prepare('SELECT * FROM `categorietutos`');
        $requete->execute();
        $recupCategorie=$requete->fetchAll();
        
        return $recupCategorie;
    }

    public function get_video()
    {
        $idCat=$_POST["categorie"];
        echo "categorie selectionnée: ".$idCat;
        $requete = self::$bdd->prepare("SELECT * FROM `tutos` where idCategorieVideo='$idCat'");
        $requete->execute();
        $recupvideo=$requete->fetchAll();
        if ($requete->rowCount() > 0) {
            echo"  | requete SQL reussi <br>";
        }else{
            echo"  | erreur select SQL";
        }
        return $recupvideo;
    
    }
}

?>