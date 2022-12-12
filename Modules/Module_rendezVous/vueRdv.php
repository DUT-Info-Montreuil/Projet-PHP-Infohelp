<?php
require_once("Modules/vuegenerique.php");
class VueRdv extends vueGenerique
{
    public function __construct()
    {
    }
    public function afficherSelectionVille($tabVille)
    {
        ?>
        <main>
                <form id="box" action="index.php?Modules=Module_rendezVous&action=voirTechnicien" method="POST">
                    <label id="ville" for="floatingInput">Selectionner une ville :</label>
                    <select id="selectVille" name="ville" class="form-select" aria-label="Default select example">
                        <option selected disabled>--ville à selectionner--</option>
                       <?php foreach ($tabVille as $villes) { ?>
                        <option value="<?=$villes['nomVille']?>"><?=$villes['nomVille']?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-primary" type="submit" name="uneVille">Selectionner</button>
                    <button class="btn btn-secondary" type="submit" name="toutesVilles">Toutes les villes</button>

                    <input type="hidden" name="categorie" value="<?=$_POST['categorie']?>">
                </form>
                </main>
        <?php
    }
    public function afficherTechnicien($req)
    {

    ?>
    <main>
    <?php if(empty($req))
            echo "il y a aucun technicien dans cette ville....";
            else{ ?>
        <form action="index.php?Modules=Module_rendezVous&action=prendreRdv" method="POST">
        

<?php
            foreach ($req as $row) {
            ?>
                <div id="technicienListe">
                    <tr>
                        <br>
                        <td><?= $row['nom']; ?></td><br>
                        <td><?= $row['prenom']; ?></td><br>
                        <td><?= $row["nomCat"]; ?></td><br>
                        <td>Note: <?= $row["note"]; ?>/5</td><br>

                        <button style="height:35px" class="btn btn-outline-secondary" type="submit" name="tec" value="<?php echo $row['idTechnicien']; ?>">Choisir ce technicien </button>
                        <input type="hidden" name="categorieRDV" value="<?=$row["idCategorie"]; ?>">
                    </tr>
                </div>
            <?php

            }

        }
            ?>

        </form>
        </main>
        </br></br></br></br></br></br></br></br>


    <?php
    }



    public function affichageFormRdv()
    {
?>
        <main>
            <form action="index.php?Modules=Module_rendezVous&action=ajoutRdv" method="POST">
                <label>
                    Veuillez selectionner le jour ainsi que l'heure qui vous convient :
                    <input type="date" name="jour" min="<?=date("Y-m-d")?>" max="2023-12-31" required>
                    <input type="time" name="heure" min="09:00" max="18:00" required>
                    <input type="hidden" name="tec" value="<?= $_POST['tec'] ?>">
                    <input type="hidden" name="categorieRDV" value="<?= $_POST['categorieRDV'] ?>">

                </label>
                <button type="submit" class="btn btn-outline-secondary">Confirmer</button>
            </form>
        </main>
    <?php
    }



    public function afficherRdv($data)
    {

    ?>

        <body>
            <main>
            <form id="box" action="index.php?Modules=Module_rendezVous&action=rdvTechnicien" method="post">
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

               ?>
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
                    <a href="index.php?Modules=Module_rendezVous&action=afficherDevis&id=<?= $idRdv ?>">Afficher le devis</a>

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
        <main> <?php
        if(empty($data))
        echo "il y a aucun technicien dans cette ville";
        else{ ?>
            <form action="" method="POST">
                <label>Selectionnez le rendez-vous vous souhaitez consulter:</label></br>
                <?php
                foreach ($data as $rdv) {
                    $idRdv = $rdv["idRdv"];
                    $dateRdv = $rdv["dateRDV"];
                    $nomTechnicien = $rdv["nom"];

                ?>
                    <a href="index.php?Modules=Module_rendezVous&action=afficherRdv&idRdv=<?php echo $idRdv; ?>" class="btn btn-outline-secondary" name="idRdv">
                        Rdv avec le technicien <?php echo $nomTechnicien . ", le " . $dateRdv; ?>
                </a>

        <?php
        }}
        ?> 
        
        </form> 
    </main>


    <?php
    }




    public function afficherCat($req)
    {
    ?>


        <main>
        <form action="index.php?Modules=Module_rendezVous&action=selectionTechParVille" method="POST">

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

        </main>

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
                    url: 'categorieAjax.php',
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

    public function affichageDevis()
    {

    ?>
    <main>
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
            <form id="formulaire" name="formulaire" method="post" action="Modules/Module_rendezVous/Export.php">
                <div class="titre_h1" style="height:350px;">
                    <div style="width:35%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
                        <u>Informations du client</u><br />
                    </div>
                    <div class="part3"></div>
                    <div class="part"></div>

                    <div class="part1"></div>
                    <div class="part5">
                        Nom du client :<br />
                        <input type="text" id="nom_client" name="nom_client" value="" />
                    </div>
                    <div class="part5">
                        Prénom du client :<br />
                        <input type="text" id="prenom_client" name="prenom_client" />
                    </div>
                    <div class="part5">
                        Adresse mail du client :<br />
                        <input type="text" id="email_client" name="email_client" />
                    </div>
                    <div class="part1"></div>

                    <div class="div_saut_ligne-2">
                    </div>

                    <div class="part"></div>
                    <div class="part6">
                        <u>Informations du service </u><br />
                    </div>
                    <div class="part"></div>

                    <div class="part1"></div>

                    <div class="part5">
                        Service <br>
                        <input disabled id="service">
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
            </main>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script>
                    $.ajax({
                        url: 'devis.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: "<?= $_SESSION['idUtilisateur']?>", idRDV:"<?=$_GET['id']?>"
                        },
                        success: function(reponse) {
                            console.log(reponse);
                            nom = reponse[1];
                            prenom = reponse[2];
                            service = reponse[17];
                            email = reponse[3];
                            prix=0;

                            document.getElementById('nom_client').setAttribute('value', nom);
                            document.getElementById('prenom_client').setAttribute('value', prenom);
                            document.getElementById('service').setAttribute('value', service);
                            document.getElementById('email_client').setAttribute('value', email);

                            if(service =="développement logiciel"){
                                prix=1000;
                            }else if(service =="développement mobile"){
                                prix=500;
                            }else if(service =="périphériques (ex:écran)"){
                                prix=100;
                            }else if(service =="appareils ménagers"){
                                prix=70;
                            }else if(service =="appareils portatifs"){
                                prix=150;
                            }else if(service =="maintenance"){
                                prix=250;
                            }else if(service =="sécurité réseaux/logiciels"){
                                prix=750;
                            }else if(service =="unité centrale (composants)"){
                                prix=250;
                            }
                            


                            document.getElementById('total_commande').setAttribute('value', prix);

                        }
                    });
            </script>
        </div>

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
            <label><?= $nom ?> <?= $prenom ?>, </label>

        <?php
        }
        ?>
        </main>
<?php

    }
}
?>