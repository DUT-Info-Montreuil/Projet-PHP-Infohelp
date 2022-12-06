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
            <input type="hidden" name="tec" value="<?=$_POST['tec']?>">
        </label>
        <p><button class="btn btn-outline-secondary" value=<?=$_POST['tec']?>>Confirmer</button></p>
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
            $idRdv=$rdv["idRdv"];
            $horaireRdv=$rdv["horaire"];
            $dateRdv=$rdv["dateRDV"];
            $idTechnicien=$rdv["userID"];

            ?>
            <button class="btn btn-outline-secondary" name="idRdv" value="<?php echo $idRdv;?>">
            <?php echo $horaireRdv." ".$dateRdv;?>
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



    public function afficheReparation()
    {
?>
        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
        <html>

        <head>
            <title>Devis</title>
            <link rel="stylesheet" type="text/css" href="style.css" media="all" />


        </head>

        <body>
            <div id="conteneur">
                <div id="colonne1">
                    <div id="modele">
                        <div id="modeletitre" class="btn-grad">
                            <h3>Vetement</h3>
                        </div></br>

                        <label for="pet-select">Catégorie :</label>

                        <select name="cat" id="cat">
                            <option value="0" id="selection">Selection</option>
                            <option value="test" id="tshirt">T-shirt</option>
                            <option value="t" id="sweat">Sweat</option>
                        </select></br></br>

                        <select name="pet-select" id="cat-tshirt">
                            <option value="0" id="selection">Selection</option>
                            <option value="3.71" id="190g">B&C 190gr - CGTU03T</option>
                            <option value="5.34" id="k356">T-shirt Kariban 190gr - K356</option>
                        </select>

                        <select name="pet-select" id="cat-sweat">T-shirt :
                            <option value="190g" id="190g">BC </option>
                            <option value="tshirt" id="kariban">Kariban</option>
                        </select></br></br>
                    </div>

                    <div id="modele">
                        <div id="modeletitre" class="btn-grad">
                            <h3>Personnalisation</h3>
                        </div></br>

                        <label for="pet-select">Impression :</label>
                        <select name="col" id="imp">
                            <option value="0" id="aucune">Aucune</option>
                            <option value="1.38" id="coeur">Coeur</option>
                            <option value="2.91" id="dos">Dos</option>
                            <option value="4.29" id="cd">Coeur/Dos</option>
                        </select> </br></br>

                        <label for="pet-select" id="coul-nom">Couleur :</label>
                        <select name="nbr-coul" id="nbr-coul">
                            <option value="0" id="1coul">1 coul.</option>
                            <option value="0.30" id="quadri">Quadri</option>
                        </select></br></br>

                        <label for="pet-select">Quantité :</label>
                        <select name="col" id="quantite">
                            <option value="0" id="1">1 > 24</option>
                            <option value="-0.10" id="25">25 > 49</option>
                            <option value="-0.20" id="50">50 > 99</option>
                            <option value="-0.25" id="99">+ 99</option>
                        </select>
                        <div id="modeletitre" class="btn-grad">
                            <h3>Prix</h3>
                        </div></br>
                        <div id="result"></div>
                    </div>
                </div>

                <div id="centre">
                    <div id="CGTU03T">
                        <div id="image"><img src="img/CGTU03T.jpg" style="width: 100%; float:left; padding-top: 1%"></div>
                    </div>

                    <div id="k356centre">
                        <div id="image"><img src="img/k356.jpg" style="width: 100%; float:left; padding-top: 1%"></div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="custom_js2.js"></script>
        </body>

        </html>
    <?php
    }


    public function affichageDevis()
    {

    ?>
        <div style="width:100%;display:block;text-align:center;">
        </div>

        <div class="div_saut_ligne" style="height:30px;">
        </div>

        <div style="float:left;width:10%;height:40px;"></div>
        <div style="float:left;width:80%;height:auto;text-align:center;">
            <div class="titre_h1">
                <h1>Facturation</h1>
            </div>
        </div>
        <!-- <div style="float:left;width:10%;height:40px;"></div> -->

        <div class="div_saut_ligne" style="height:30px;">
        </div>

        <div style="float:left;width:10%;height:350px;"></div>
        <div style="float:left;width:80%;height:350px;text-align:center;">
            <form id="formulaire" name="formulaire" method="post" action="rep_facture.php">
                <div class="titre_h1" style="height:350px;">
                    <div style="width:10%;height:50px;float:left;"></div>
                    <div style="width:35%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
                        <u>Informations du client</u><br />
                    </div>
                    <div style="width:10%;height:50px;float:left;"></div>
                    <div style="width:35%;height:50px;float:left;font-size:16px;font-weight:bold;text-align:left;">

                    </div>
                    <div style="width:10%;height:50px;float:left;"></div>

                    <div style="width:10%;height:75px;float:left;"></div>
                    <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                        Réf. Client :<br />
                        <select  name="ref_client">
                            <option value="0">Choisir client</option>
                            <option id="ref_client" value="1">Vous</option>
                            <option value="2">Une autre personne</option>
                            <!-- Si c'est lui alors en cliquant dessus les champs sont automatiquement rempli -->
                            <!-- Si c'est une autre personne, il remplit lui même les champs -->
                            <?php

                            ?>
                        </select>
                    </div>
 <div style="width:15%;height:50px;float:left;font-size:16px;font-weight:bold;text-align:left;">

                    </div>
                    <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                        Nom du client :<br />
                        <input type="text" id="nom_client" name="nom_client" value=""/>
                    </div>
                    <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                        Prénom du client :<br />
                        <input type="text" id="prenom_client" name="prenom_client" />
                    </div>
                    <div style="width:10%;height:75px;float:left;"></div>

                    <div class="div_saut_ligne" style="height:5px;">
                    </div>

                    <div style="width:10%;height:50px;float:left;"></div>
                    <div style="width:80%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
                        <u>Informations du service</u><br />
                    </div>
                    <div style="width:10%;height:50px;float:left;"></div>

                    <div style="width:10%;height:75px;float:left;"></div>
                    <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                        Type de service :<br />
                        <select id="ref_produit" name="ref_produit">
                            <option value="0">Service</option>
                            <option value="1">Conseil</option>
                            <option value="2">Réparation</option>
                            <?php

                            ?>
                        </select>
                    </div>
                    <div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                        Prix unitaire HT :<br />
                        <input type="text" id="puht" name="puht" />
                    </div>

                    <div class="div_saut_ligne" style="height:30px;">
                    </div>


                    <div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
                        Total commande :<br />
                        <input type="text" id="total_commande" name="total_commande" />
                    </div>
                    <div style="width:25%;height:75px;font-size:16px;font-weight:bold;">
                        <input type="button" id="valider" name="valider" value="Valider" style="margin-top:10px;" /><br />
                    </div>
                    <a href="index.php?Modules=Module_rendezVous&action=devis">Exporter</a>
                </div>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                        <script>

                            $('#ref_client').click(function() {
                                $.ajax({
                                    url: '../devis.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {id : "<?=$_SESSION['userID']?>"},
                                    success: function(reponse){
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



