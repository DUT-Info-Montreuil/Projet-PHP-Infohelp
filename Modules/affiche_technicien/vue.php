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
        //if ($req->rowcount() > 0) {
    ?>
        <!-- <table>
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
                    Catégorie
                </th>
            </tr>

        </table> -->
        <?php
        //while ($row = $req->fetch()) { 
        foreach ($req as $row) {
        ?>

            <tr>
                <br>
                <td> id : <?= $row['idTechnicien']; ?></td><br>
                <td> nom : <?= $row['nom']; ?></td><br>
                <td> prenom : <?= $row['prenom']; ?></td><br>
                <td> categorie :<?= $row["nomCat"];
                            } ?></td><br>


                <?php //} else {
                ?>

                <!-- <p>ERREUR DE SAISIE</p> -->
                <?php //}
                ?>

            </tr>
        <?php }

    public function afficherCat($req)
    {
        ?>
            <form action="index.php?Modules=affiche_technicien&action=liste_tech" method="POST">
                <label>Selectionnez la categorie que vous souhaitez :</label></br>
                <?php
                while ($line = $req->fetch()) {
                    $id = $line["idCat"];
                    $nomCategorie = $line["nomCat"];
                ?>
                    <button name="categorie" value=<?= $id ?>>
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