<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class VueTuto extends vueGenerique
{
    public function __construct()
    {
    }
    public function afficher_categrorieVideo($data)
    {
        ?>
        <?php
        foreach ($data as $categories) { 
            $categorie=$categories["categorie"];
            ?>
            
            <a href="index.php?Modules=Module_tuto&action=afficheListeTutos&categorie=".$categorie><?php echo $categorie;?></a><br>

        <?php
        }
        ?>    
<?php
    }

    public function afficher_Video($data)
    {
        //echo $data['lienVideo'];
        ?>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/KecoxVL2UDU" frameborder="0"  allowfullscreen></iframe>
            <?php
        foreach ($data as $lien) { 
            $id=$categorie["idTuto"];
            ?>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/KecoxVL2UDU" frameborder="0"  allowfullscreen></iframe>


        <?php
        }


    }

}
?>