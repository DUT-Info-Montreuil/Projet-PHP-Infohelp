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
                <input type="date" name="jour" min="<?= date("Y-m-d") ?>" max="2023-12-31" required>
                <input type="time" name="heure" min="09:00" max="18:00" required>
                <input type="hidden" name="tec" value="<?= $_POST['tec'] ?>">
            </label>
            <button class="btn btn-outline-secondary" value=<?= $_POST['tec'] ?>>Confirmer</button>
        </form>

    <?php
    }


    public function afficherRdv($data)
    {
    ?>

        <body>
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
                        Le <?= $dateRdv ?>, à <?= $dateRdv ?></label></br></br>

                    <label>Mettre une note au technicien (note/5): </label>
                    <select name="choixNote" id="choixNote">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select></br></br>

                    <button class="btn btn-outline-secondary">Confirmer</button></br></br>

                    <button class="btn btn-outline-success" id="MettreFavoris" name="MettreFavoris">Mettre ce technicien en favoris</button>


                    <button type="submit" name="boutonAnnuler" class="btn btn-outline-danger">Annuler le rendez-vous</button>


                    <input type="hidden" name="idRdv" value="<?= $idRdv ?>">
                    <input type="hidden" name="idTechnicien" value="<?= $idTechnicien ?>">
                    <input type="hidden" name="idUtilisateur" value="<?= $idUtilisateur ?>">

                <?php
                }
                ?>
            </form>
        </body>

        </html>
    <?php
    }


    public function afficherRdvUtilisateur($data)
    {
    ?>
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


        <!-- <form action="index.php?Modules=Module_rendezVous&action=retirerRdv" method="POST">
        <label>Selectionnez le rendez-vous que vous souhaitez annuler:</label></br>
        <?php
        /*
        foreach ($data as $rdv) { 
            $idRdv=$rdv["idRdv"];
            $horaireRdv=$rdv["horaire"];
            $dateRdv=$rdv["dateRDV"];
            $idTechnicien=$rdv["userID"];

            ?>
            <button class="btn btn-outline-secondary" name="idRdv" value="<?php echo $idRdv;?>">
            <?php echo $horaireRdv." ".$dateRdv;?>
            </button>

        <?php
        }*/
        ?> 
        
        </form> -->



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
    ?>
        <form action="index.php?Modules=Module_rendezVous&action=prendreRdv" method="POST">
            <?php

            foreach ($req as $row) {
            ?>
                <div class="col-3">
                    <tr>
                        <br>
                        <td><?= $row['nom']; ?></td><br>
                        <td><?= $row['prenom']; ?></td><br>
                        <td><?= $row["nomCat"]; ?></td><br>

                        <button style="height:35px" class="btn btn-outline-secondary" type="submit" name="tec" value="<?php echo $row['idTechnicien']; ?>">Choisir ce technicien </button>

                    </tr>
                </div>
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

            <div class="container">
                <div class="col-md-12">
                    <h2>Choisir la catégorie de reparation</h2>
                </div>
                <div class="col-md-3">

                    <ul class="nav nav-list-main">
                        <li class="nav-divider"></li>
                        <li><label class="btn btn-secondary dropdown-toggle nav-toggle nav-header"><span>Reparation</span></label>
                            <ul class="nav nav-list nav-left-ml">
                                <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Logiciel</span></label>
                                    <ul class="nav nav-list nav-left-ml">
                                        <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Developpement</span></label>
                                            <ul class="nav nav-list nav-left-ml">
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat1"></li></button>
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat2"></button></li>
                                            </ul>
                                        </li>
                                        <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Securité</span></label>
                                            <ul class="nav nav-list nav-left-ml">
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat3"></button></li>
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat4"></button></li>

                                            </ul>
                                        </li>

                                    </ul>
                                <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Materiel</span></label>
                                    <ul class="nav nav-list nav-left-ml">
                                        <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Appareils éléctroniques</span></label>
                                            <ul class="nav nav-list nav-left-ml">
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat5"></button></li>
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat6"></button></li>
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat7"></button></li>
                                                <li><button class="btn btn-outline-dark categorie" name="categorie" id="cat8"></button></li>

                                            </ul>
                                        </li>
                                        <li><a class="categorie" id="cat2" href="#"></a></li>

                                    </ul>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $('ul.nav-left-ml').toggle();
            $('label.nav-toggle span').click(function() {
                $(this).parent().parent().children('ul.nav-left-ml').toggle(300);
                var cs = $(this).attr("class");
                if (cs == 'nav-toggle-icon glyphicon glyphicon-chevron-right') {
                    $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
                }
                if (cs == 'nav-toggle-icon glyphicon glyphicon-chevron-down') {
                    $(this).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
                }
            });

            var nom;
            $('.nav-header').click(function() {
                $.ajax({
                    url: '../categorieAjax.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id1: "<?= $req[0]['idCat'] ?>",
                        id2: "<?= $req[1]['idCat'] ?>",
                        id3: "<?= $req[2]['idCat'] ?>",
                        id4: "<?= $req[3]['idCat'] ?>",
                        id5: "<?= $req[4]['idCat'] ?>",
                        id6: "<?= $req[5]['idCat'] ?>",
                        id7: "<?= $req[6]['idCat'] ?>",
                        id8: "<?= $req[7]['idCat'] ?>"
                    },
                    success: function(response) {
                        console.log(response);
                        nom = response[2][1];
                        nom1 = response[3][1];
                        nom2 = response[6][1];
                        nom3 = response[4][1];
                        nom4 = response[1][1];
                        nom5 = response[5][1];
                        nom6 = response[0][1];
                        nom7 = response[7][1];
                        document.getElementById('cat1').value = nom;
                        document.getElementById('cat2').value = nom1;
                        document.getElementById('cat3').value = nom2;
                        document.getElementById('cat4').value = nom3;
                        document.getElementById('cat5').value = nom4;
                        document.getElementById('cat6').value = nom5;
                        document.getElementById('cat7').value = nom6;
                        document.getElementById('cat8').value = nom7;

                        $("#cat1").html(nom);
                        $("#cat2").html(nom1);
                        $("#cat3").html(nom2);
                        $("#cat4").html(nom3);
                        $("#cat5").html(nom4);
                        $("#cat6").html(nom5);
                        $("#cat7").html(nom6);
                        $("#cat8").html(nom7);

                    }
                });
            })
        </script>

        <?php

        ?>

        </form>

    <?php
    }
    public function afficherTechnicienFavoris($data)
    {
    ?>
        <label>Liste de mes techniciens favoris: </label></br>
        <?php
        foreach ($data as $tech) {
            $nom = $tech["nom"];
            $prenom = $tech["prenom"];
        ?>
            <label><?= $nom ?> <?= $prenom ?>, </label>

        <?php
        }
        ?>
<?php

    }
}
?>