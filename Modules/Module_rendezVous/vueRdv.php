<!-- Template ou utiliser les variables stocker dans le modeles -->
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



    public function barre_de_recherche()
    {
    ?>

        <body>
            <form action="index.php?Modules=Module_rendezVous&action=list" method="post">
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


    public function affichageDevis()
    {

    ?>
        <div style="width:100%;display:block;text-align:center;"></div>

        <div style="float:left;width:10%;height:40px;"></div>
        <div style="float:left;width:80%;height:auto;text-align:center;">
            <div class="titre_h1">
                <h1>Facturation</h1>
            </div>
        </div>

        <div class="div_saut_ligne-1">
        </div>

        <div style="float:left;width:10%;height:350px;"></div>
        <div style="float:left;width:80%;height:350px;text-align:center;">
            <form id="formulaire" name="formulaire" method="post" action="Module_rendezVous/Export.php">
                <div class="titre_h1" style="height:350px;">
                    <div style="width:35%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
                        <u>Informations du client</u><br />
                    </div>
                    <div class="part3"></div>
                    <div class="part"></div>

                    <div class="part1"></div>
                    <div class="part2">
                        Réf. Client :<br />
                        <select name="ref_client">
                            <option value="0">Choisir client</option>
                            <option id="ref_client" value="1">Vous</option>
                            <option value="2">Une autre personne</option>
                            <?php
                            ?>
                        </select>
                    </div>
                    <div class="part4">

                    </div>
                    <div class="part5">
                        Nom du client :<br />
                        <input type="text" id="nom_client" name="nom_client" value="" />
                    </div>
                    <div class="part5">
                        Prénom du client :<br />
                        <input type="text" id="prenom_client" name="prenom_client" />
                    </div>
                    <div class="part1"></div>

                    <div class="div_saut_ligne-2">
                    </div>

                    <div class="part"></div>
                    <div class="part6">
                        <u>Informations du service</u><br />
                    </div>
                    <div class="part"></div>

                    <div class="part1"></div>

                    <div class="part5">
                        Service <br>
                        <label for=""> B</label>
                    </div>

                    <div class="part5">
                        Prix unitaire :<br />
                        <input type="text" id="puht" name="puht" />
                    </div>

                    <div class="div_saut_ligne-3">
                    </div>


                    <div class="part2">
                        Total commande :<br />
                        <input type="text" id="total_commande" name="total_commande" />
                    </div>


                    <div class="part1"></div>
                    <div class="part5">
                        <br>
                        <input class="btn btn-outline-success" id="telecharger" type="submit" value="Télécharger vers Excel">
                    </div>



                </div>

            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script>
                $('#ref_client').click(function() {
                    $.ajax({
                        url: '../devis.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: "<?= $_SESSION['userID'] ?>"
                        },
                        success: function(reponse) {
                            console.log(reponse);
                            nom = reponse[1];
                            prenom = reponse[2];
                            document.getElementById('nom_client').setAttribute('value', nom);
                            document.getElementById('prenom_client').setAttribute('value', prenom);
                        }
                    });
                })
            </script>
        </div>
<?php
    }
}
?>