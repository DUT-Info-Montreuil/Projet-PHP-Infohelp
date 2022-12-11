<?php
require_once("Modules/vuegenerique.php");
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
    public function toutLesTechniciens($req){
        /*index.php?Modules=Module_rendezVous&action=voirTechnicien*/
        ?>
        <form action="index.php?Modules=Module_rendezVous&action=prendreRdv" method="post">
            <label>Liste des techniciens</label></br>

            <?php
            foreach ($req as $technicien) {
                $idTech = $technicien["idTechnicien"];
                $nom = $technicien["nom"];
                $prenom = $technicien["prenom"];


            ?>
                <button class="btn btn-outline-secondary" name="tec" value="<?= $idTech ?>">
                    <?= $nom . " " . $prenom ?>
                </button>
            <?php } ?>
        </form>
        <?php
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
        <main>
            <form action="index.php?Modules=Module_rendezVous&action=affichererRdv" method="POST">
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
        }*/
        ?> 
        
        </form> -->



    <?php
    }







    public function afficherCat($req)
    {
    ?>
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
        <form action="index.php?Modules=Module_rendezVous&action=prendreRdv" method="POST">
        <?php

        foreach ($req as $row) {
        ?>
            <tr>
                <br>
                <td> n° : <?= $row['idTechnicien']?></td><br>
                <td> nom : <?= $row['nom']; ?></td><br>
                <td> prenom : <?= $row['prenom']; ?></td><br>
                <td> categorie :<?= $row["nomCat"];?></td><br>
                
                <label>Choisir le technicien n° </label><input class="btn btn-outline-secondary" type="submit" name="tec" value="<?php echo $row['idTechnicien'];?>"> 

            </tr>
                <?php 

            } 
            
            
            ?>  

            </form>
       
        <?php 
        }


    public function affichageDevis()
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