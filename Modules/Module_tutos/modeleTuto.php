
<?php
require_once('Connexion.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");

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
        $idCat=$_GET["categorie"];
        $requete = self::$bdd->prepare("SELECT * FROM `tutos` where idCategorieVideo='$idCat'");
        $requete->execute();
        $recupvideos=$requete->fetchAll();

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
            echo"erreur requete SQL";
        }
        return $recupvideo;
    }

    
    public function get_categorieVideo()
    {
        $requete = self::$bdd->prepare("SELECT * FROM `categorietutos`");
        $requete->execute();
        $recupCategorieVideo=$requete->fetchAll();

        return $recupCategorieVideo;
    }


    public function ajoutTuto()
    {
        if(isset($_POST['ajoutTutoBtn'])){
            $titre=$_POST['titreTuto'];
            $auteur=$_POST['auteurTuto'];
            $lien=$_POST['lienTuto'];
            $categorie= $_POST['choix'];

            $imageName = $_FILES["image"]["name"];
            $tmpName = $_FILES["image"]["tmp_name"];
      
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));
            $newImageName = date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
            $newImageName .= '.' . $imageExtension;

            $insert = self::$bdd->prepare("INSERT INTO `tutos` (`titre`, `auteur`, `lienVideo`, `idCategorieVideo`, `miniature`) VALUES (:par,:par2,:par3,:par4,:par5)");
            $insert->execute(array(':par' => $titre, ':par2' => $auteur, ':par3' => $lien, ':par4' => $categorie, ':par5' => $newImageName));
            move_uploaded_file($tmpName, 'Modules/Module_tutos/images/' . $newImageName);

        }
        header("Location: index.php?Modules=Module_accueil&action=Accueil");

    }

}

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/

?>