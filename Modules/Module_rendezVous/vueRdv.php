<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");
class VueRdv extends vueGenerique
{
    public function __construct()
    {
    }

    public function affichageFormRdv()
    {
?>
        <main>
            <form action="index.php?Modules=Module_rendezVous&action=ajoutRdv" method="POST">
                <label>
                    Veuillez selectionner le jour ainsi que l'heure qui vous convient :
                    <input type="date" name="jour" required>
                    <input type="time" name="heure" required>
                    <input type="hidden" name="tec" value="<?= $_POST['tec'] ?>">
                </label>
                <button class="btn btn-outline-secondary" value=<?= $_POST['tec'] ?>>Confirmer</button>
            </form>
        </main>
    <?php
    }


    public function afficherRdv($data)
    {
    ?>

        <body>
            <main>
            <form action="index.php?Modules=Module_rendezVous&action=rdvTechnicien" method="post">
                <?php
                foreach ($data as $rdv) {
                    $idRdv = $rdv["idRdv"];
                    $dateRdv = $rdv["dateRDV"];
                    $heureRdv = $rdv["horaire"];
                    $nomTechnicien = $rdv["nom"];
                    $prenomTechnicien = $rdv["prenom"];
                    $note = $rdv["note"];
                    $idTechnicien = $rdv["idTechnicien"];
                    $idUtilisateur = $rdv["idUtilisateur"];

                    /*                     $fav= isset($_GET['MettreFavoris']) ? $_GET['MettreFavoris'] : 0;
 */                ?>
                    <div>
                        <h3>Rendez-vous<h3></br>
                    </div>
                    <label>Technicien: <?= $nomTechnicien . " " . $prenomTechnicien ?></br>
                        Le <?= $dateRdv ?>, à <?= $dateRdv ?></label></br>

                    <label>Mettre une note au technicien (note/5): </label>
                    <input placeholder="<?= $note ?>" minlength="0" maxlength="1" size="3" type="text" name="note"></br>
                    <label for="MettreFavoris">Mettre ce technicien en favoris </label>
                    <input type="checkbox" class="form-check-input" id="MettreFavoris" name="MettreFavoris" value="1" <?php if (isset($_GET['MettreFavoris']) == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>></br>
                    <button class="btn btn-outline-secondary">Confirmer</button>


                    <button type="submit" name="boutonAnnuler" class="btn btn-outline-danger">Annuler le rendez-vous</button>


                    <input type="hidden" name="idRdv" value="<?= $idRdv ?>">
                    <input type="hidden" name="idTechnicien" value="<?= $idTechnicien ?>">
                    <input type="hidden" name="idUtilisateur" value="<?= $idUtilisateur ?>">

                <?php
                }
                ?>
            </form>
            </main>
        </body>

        </html>
    <?php
    }


    public function afficherRdvUtilisateur($data)
    {
    ?>
        <main>
            <form action="index.php?Modules=Module_rendezVous&action=afficherRdv" method="POST">
                <label>Selectionnez le rendez-vous vous souhaitez consulter:</label></br>
                <?php
                foreach ($data as $rdv) {
                    $idRdv = $rdv["idRdv"];
                    $dateRdv = $rdv["dateRDV"];
                    $nomTechnicien = $rdv["nom"];

                ?>
                    <button class="btn btn-outline-secondary" name="idRdv" value="<?php echo $idRdv; ?>">
                        <?php echo $nomTechnicien . ", le " . $dateRdv; ?>
                    </button>

                <?php
                }
                ?>

            </form>


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
            </main>


        <?php
    }


    public function afficherTechnicien($req)
    {
        //if ($req->rowcount() > 0) {
    ?>
        <main>
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
        </main>
    <?php
    }

    public function afficherCat($req)
    {
    ?>

        <main>
            <form id="formCategorie" action="index.php?Modules=Module_rendezVous&action=liste_tech" method="POST">
                <label>Selectionnez la categorie que vous souhaitez :</label></br>
                <?php
                $id = $req[1]["idCat"];
                $nomCategorie = $req[1]["nomCat"];
                ?>
                <div id="categorie">
                    <button onclick="afficheSousCat()" name="categorie">
                        Reparation
                    </button>
                    <div>

                        <div id="div_categorie">
                            <button type="submit" class="btn btn-outline-secondary" name="categorie" value=<?= $req[0]["idCat"] ?> name="categorie">
                                <?= $req[0]["nomCat"]; ?>
                            </button>

                            <button type="submit" class="btn btn-outline-secondary" name="categorie" value=<?= $id ?>>
                                <?= $nomCategorie; ?>
                            </button>
                        <div>


            </form>
        </main>

    <?php
    }
    public function afficherTechnicienFavoris($data)
    {
    ?>
        <main>
            <label>Liste de mes techniciens favoris: </label></br>
            <?php
            foreach ($data as $tech) {
                $nom = $tech["nom"];
                $prenom = $tech["prenom"];
            ?>
                <label><?= $nom ?> , <?= $prenom ?></label>

            <?php
            }
            ?>


            </form>
        </main>
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