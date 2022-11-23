<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class vueAdmin extends vueGenerique
{
    public function __construct()
    {
    }
    public function afficheUser($data)
    {

?>
        <form action="index.php?Modules=ADMIN&action=retirerUser" method="post">
            <label>Liste des utilisateurs, cliquer sur celui que vous souhaitez supprimer :</label></br>

            <?php
            foreach ($data as $user) {
                $idUser = $user["userID"];
                $nom = $user["first_name"];
                $prenom = $user["last_name"];


            ?>
                <button class="btn btn-outline-secondary" name="idUser" value="<?= $idUser ?>">
                    <?= $nom . " " . $prenom ?>
                </button>
            <?php } ?>
        </form>

    <?php
    }
    public function showConnection()
    {
    ?>

<?php
    }
}

?>