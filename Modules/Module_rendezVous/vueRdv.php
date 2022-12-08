<?php
require_once("vuegenerique.php");
class VueRdv extends vueGenerique
{
    public function __construct()
    {
    }
    public function afficherVille()
    {
        ?>
                <form action="index.php?Modules=Module_rendezVous&action=voirTechnicien" method="POST">
                    <label id="ville" for="floatingInput">Selectionner une ville :</label>
                    <select id="selectVille" name="city" class="form-select" aria-label="Default select example">
                        <option selected>ville à selectionner</option>
                        <option value="Paris">Paris</option>
                        <option value="Sarcelles">Sarcelles</option>
                        <option value="Nanterre">Nanterre</option>
                        <option value="Montreuil">Montreuil</option>
                        <option value="Creteil">Creteil</option>
                        <option value="Cergy">Cergy</option>
                    </select>
                    <button class="btn btn-primary" type="submit">Validé</button>
                </form>
        <?php
    }
    public function toutLesTechniciens($req){
        /*index.php?Modules=Module_rendezVous&action=voirTechnicien*/
        ?>
        <form action="#" method="post">
            <label>Liste des technicien</label></br>

            <?php
            foreach ($req as $technicien) {
                $idTech = $technicien["idTechnicien"];
                $nom = $technicien["nom"];
                $prenom = $technicien["prenom"];


            ?>
                <button class="btn btn-outline-secondary" name="idUser" value="<?= $idTech ?>">
                    <?= $nom . " " . $prenom ?>
                </button>
            <?php } ?>
        </form>
        <?php
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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
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
    </body>
    </html>
        
<?php
    }
}
?>