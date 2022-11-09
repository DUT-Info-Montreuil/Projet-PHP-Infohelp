<?php
require_once("vuegenerique.php");

class vue_techniciens extends vueGenerique
{

    public function __construct()
    {
    }
    public function barre_de_recherche()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>
            <form action="index.php?Modules=affiche_technicien&action=list" method="post">
                <label> rechercher </label>
                <input type="text" name="recherche" placeholder="Technicien de la catégorie ...">
                <input type="submit" value="sub">
            </form>
        </body>

        </html>
        <?php
    }
    public function afficherTechnicien($req)
    {
        if ($req->rowcount() > 0) {
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
                    <th>
                        id Catégorie
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
                    <td><?php echo $row["rayon d'activite"]; ?>
                    <td><?php echo $row["idCategorie"]; ?>
                    <td><?php echo $row["nomCat"];
                    } ?></td>


                <?php } else {
                ?>

                    <p>ERREUR DE SAISIE</p>
                <?php }
                ?>

                </tr>
            <?php }

        public function afficherCat($req)
        {
            ?>
                <form action="index.php?Modules=Module_tuto&action=liste_catégorie" method="POST">
                    <label>Selectionnez la categorie que vous souhaitez :</label></br>
                    <?php
                    while ($line = $req->fetch()) {
                        $id = $line["idCat"];
                        $nomCategorie = $line["nomCat"];
                    ?>
                        <button name="categorie" value="<?= $id ?>;">
                            <?= $nomCategorie; ?>
                        </button>

                    <?php
                    }
                    ?>

                </form>
        <?php
        }
    }

        ?>