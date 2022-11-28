<?php
require_once("vuegenerique.php");
class VueRdv extends vueGenerique
{
    public function __construct()
    {
    }

    public function affichageFormRdv()
    {
?>
        <form action="index.php?Modules=Module_rendezVous&action=ajoutRdv" method="POST">
            <label>
                Veuillez selectionner le jour ainsi que l'heure qui vous convient :
                <input type="date" name="jour" required>
                <input type="time" name="heure" required>
                <input type="hidden" name="tec" value="<?= $_POST['tec'] ?>">
            </label>
            <p><button class="btn btn-outline-secondary" value=<?= $_POST['tec'] ?>>Confirmer</button></p>
        </form>

    <?php
    }

    public function afficherRdvUtilisateur($data)
    {
    ?>
        <form action="index.php?Modules=Module_rendezVous&action=retirerRdv" method="POST">
            <label>Selectionnez le rendez-vous que vous souhaitez annuler:</label></br>
            <?php
            foreach ($data as $rdv) {
                $idRdv = $rdv["idRdv"];
                $horaireRdv = $rdv["horaire"];
                $dateRdv = $rdv["dateRDV"];
                $idTechnicien = $rdv["userID"];

            ?>
                <button class="btn btn-outline-secondary" name="idRdv" value="<?php echo $idRdv; ?>">
                    <?php echo $horaireRdv . " " . $dateRdv; ?>
                </button>

            <?php
            }
            ?>

        </form>


    <?php
    }

    public function afficherTechnicien($req)
    {
        //if ($req->rowcount() > 0) {
    ?>
        <form action="index.php?Modules=Module_rendezVous&action=prendreRdv" method="POST">
            <?php

            foreach ($req as $row) {
            ?>
                <tr>
                    <br>
                    <td> n° : <?= $row['idTechnicien'] ?></td><br>
                    <td> nom : <?= $row['nom']; ?></td><br>
                    <td> prenom : <?= $row['prenom']; ?></td><br>
                    <td> categorie :<?= $row["nomCat"]; ?></td><br>

                    <label>Choisir le technicien n° </label><input class="btn btn-outline-secondary" type="submit" name="tec" value="<?php echo $row['idTechnicien']; ?>">

                </tr>
            <?php

            }


            ?>

        </form>

    <?php
    }

    public function afficherCat($req)
    {
    ?>
        <form action="index.php?Modules=Module_rendezVous&action=liste_tech" method="POST">
            <label>Selectionnez la categorie que vous souhaitez :</label></br>
            <?php
            foreach ($req->fetchAll() as $line) {
                $id = $line["idCat"];
                $nomCategorie = $line["nomCat"];
            ?>
                <button class="btn btn-outline-secondary" name="categorie" value=<?= $id ?>>
                    <?= $nomCategorie; ?>
                </button></br>

            <?php
            }
            ?>

        </form>
<?php
    }
}
?>