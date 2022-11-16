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
        <form action="index.php?Modules=ADMIN&action=Afficher_user" method="post"></form>

        <?php
        foreach ($data as $user) {
            $idUser = $user["userID"];
            $nom = $user["first_name"];
            $prenom = $user["last_name"];


        ?>
            <button class="btn btn-outline-secondary" name="idRdv" value="<?= $idUser ?>">
                <?= $nom . " " . $prenom ?>
            </button>
        <?php } ?>

    <?php
    }
    public function showConnection()
    {
    ?>

<?php
    }
}

?>