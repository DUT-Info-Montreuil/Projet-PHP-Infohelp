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

    public function getListeVideos()
    {
        $idCat=$_POST["categorie"];
        echo "categorie selectionnée: ".$idCat;
        $requete = self::$bdd->prepare("SELECT * FROM `tutos` where idCategorieVideo='$idCat'");
        $requete->execute();
        $recupvideos=$requete->fetchAll();
        if ($requete->rowCount() > 0) {
            echo"  | requete SQL reussi <br>";
        }else{
            echo"  | erreur select SQL";
        }
        return $recupvideos;
    
    }

    public function get_Video($lien)
    {
        $requete = self::$bdd->prepare("SELECT * FROM `tutos` where lienVideo='$lien'");
        $requete->execute();
        $recupvideo=$requete->fetchAll();
        if ($requete->rowCount() > 0) {
            $update = self::$bdd->prepare("UPDATE `tutos` SET `nbVues`= (`nbVues`+1) where lienVideo='$lien'");
            $update->execute();
        }else{
            echo"  | erreur requete SQL";
        }
        return $recupvideo;
    }

    public function ajoutTuto()
    {
        var_dump($_POST['choix']);
        if(isset($_POST['ajoutTutoBtn'])){
            $titre=$_POST['titreTuto'];
            $auteur=$_POST['auteurTuto'];
            $lien=$_POST['lienTuto'];
            $categorie= $_POST['choix'];
            $insert = self::$bdd->prepare("INSERT INTO `tutos` (`titre`, `auteur`, `lienVideo`, `idCategorieVideo`) VALUES (:par,:par2,:par3,:par4)");
            $insert->execute(array(':par' => $titre, ':par2' => $auteur, ':par3' => $lien, ':par4' => $categorie));
        
        }
    }

}

?>