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
            <form action="index.php?Modules=ADMIN&action=list" method="post">
                <label> rechercher </label>
                <input type="text" name="recherche" placeholder="Technicien de la catégorie ...">
                <input type="submit" value="sub">
            </form>
        </body>

        </html>
    <?php
    }
    public function afficher($req)
    {
    ?>
        <table>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Nom
                </th>
                <th>
                    Prenom
                </th>
                <th>
                    idVille
                </th>
                <th>
                    avis
                </th>
                <th>
                    favoris
                </th>
                <th>
                    rayon d'activité
                </th>
            </tr>

        </table>
        <?php
        while ($row = $req->fetch()) { ?>

            <tr>
                <td><?php echo $row['idTechnicien']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['prenom']; ?></td>
                <td><?php echo $row['idVille']; ?></td>
                <td><?php echo $row['avis']; ?></td>
                <td><?php echo $row['favoris']; ?></td>
                <td><?php echo $row["rayon d'activite"]; ?></td>

            </tr>
        <?php } ?>
        </tr>
    <?php }

    public function showConnection()
    {
    ?>

<?php
    }
}

?>