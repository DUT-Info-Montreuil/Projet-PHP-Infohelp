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
        <form action="index.php?Modules=Module_tuto&action=afficheListeTutos" method="POST">
        <label>Selectionnez la categorie qui vous concerne:</label></br>
        <?php
        foreach ($data as $categorie) { 
            $idCategorie=$categorie["idCategorieTuto"];
            $nomCategorie=$categorie["nomCategorie"];
            ?>
            <button name="categorie" value="<?= $idCategorie;?>">
            <?= $nomCategorie?>
            </button>

        <?php
        }
        ?> 

        </form>
        
   
<?php
    }


    public function afficher_Liste_Video($data)
    {
        ?>
        <form action="index.php?Modules=Module_tuto&action=afficheListeTutos" method="POST">
        <label>Selectionnez la categorie qui vous concerne:</label></br>
        <?php
        foreach ($data as $categorie) { 
            $idCategorie=$categorie["idCategorieTuto"];
            $nomCategorie=$categorie["nomCategorie"];
            ?>
            <button name="categorie" value="<?= $idCategorie?>">
            <?= $nomCategorie?>
            </button>

        <?php
        }
        ?> 

        </form>

<?php
    }

    public function afficher_Video($data)
    {
        foreach ($data as $lien) { 
            ?>
                <button name="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $lien['lienVideo'];?>" frameborder="0"  allowfullscreen></iframe></button>
                <label>Titre: <?= $lien['titre']?>
                <br>Vues:
                </label>
        <?php
        }


    }

}
?>