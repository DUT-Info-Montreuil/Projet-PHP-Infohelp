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

    public function barre_de_recherche()
    {
    ?>

        <body>
            <form action="index.php?Modules=ADMIN&action=liste_tech" method="post">
                <label> rechercher </label>
                <input type="text" name="recherche" placeholder="Nom du technicien">
                <input type="submit" value="sub">
            </form>
        </body>

        </html>
    <?php
    }
    public function afficher($req)
    {
    ?>

        <form action="index.php?Modules=ADMIN&action=user" method="post">
            <label>Liste des techniciens rechercher : </label></br>

            <?php
            foreach ($req as $tech) {
                $idTech = $tech["idTechnicien"];
                $nom = $tech["nom"];
                $prenom = $tech["prenom"];


            ?>
                <br><button class="btn btn-outline-secondary" name="idUser" value="<?= $idTech ?>">
                    <?= $nom . " " . $prenom ?>
                </button>
            <?php } ?>
        </form>
        </tr>
    <?php }

    public function showConnection()
    {
    ?>

<?php
    }
}

?>