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
        <button class="btn btn-outline-secondary" value=<?=$_POST['tec']?>>Confirmer</button>
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
                    $idRdv=$rdv["idRdv"];
                    $dateRdv=$rdv["dateRDV"];
                    $heureRdv=$rdv["horaire"];
                    $nomTechnicien=$rdv["nom"];
                    $prenomTechnicien=$rdv["prenom"];
                    $note=$rdv["note"];
                    $idTechnicien=$rdv["idTechnicien"];
                    $idUtilisateur=$rdv["idUtilisateur"];

/*                     $fav= isset($_GET['MettreFavoris']) ? $_GET['MettreFavoris'] : 0;
 */                ?>                        
                    <div>
                        <h3>Rendez-vous<h3></br>
                    </div>
                    <label>Technicien: <?= $nomTechnicien." ".$prenomTechnicien?></br>
                    Le <?=$dateRdv?>, à <?=$dateRdv?></label></br>
                    
                    <label>Mettre une note au technicien (note/5): </label>
                    <input placeholder="<?=$note?>" minlength="0" maxlength="1" size="3" type="text" name="note"></br>
                    <label for="MettreFavoris">Mettre ce technicien en favoris </label>
                        <input type="checkbox" class="form-check-input" id="MettreFavoris" name="MettreFavoris" value="1" <?php if(isset($_GET['MettreFavoris'])==1){echo"checked";}?>></br>
                        <button class="btn btn-outline-secondary">Confirmer</button>


                        <button type="submit" name="boutonAnnuler" class="btn btn-outline-danger">Annuler le rendez-vous</button>

                    
                    <input type="hidden" name="idRdv" value="<?=$idRdv?>">
                    <input type="hidden" name="idTechnicien" value="<?=$idTechnicien?>">
                    <input type="hidden" name="idUtilisateur" value="<?=$idUtilisateur?>">

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
            $idRdv=$rdv["idRdv"];
            $dateRdv=$rdv["dateRDV"];
            $nomTechnicien=$rdv["nom"];

            ?>
            <button class="btn btn-outline-secondary" name="idRdv" value="<?php echo $idRdv;?>">
            <?php echo $nomTechnicien.", le ".$dateRdv;?>
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

         
 

<div class="container">
  <div class="col-md-12"><h2>Catégories de reparation</h2></div>
  <div class="col-md-3">

    <ul class="nav nav-list-main">
      
        <li class="nav-divider"></li>
        <li><label class="btn btn-secondary dropdown-toggle nav-toggle nav-header"><span>Reparation</span></label>
            <ul class="nav nav-list nav-left-ml">
            <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Logiciel</span></label>
            <ul class="nav nav-list nav-left-ml">
                    <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Developpement</span></label>
                        <ul class="nav nav-list nav-left-ml">
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat1" href="#"></a></li>  
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat2" href="#"></a></li>
                        </ul>
                    </li>
                    <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Securité</span></label>
                        <ul class="nav nav-list nav-left-ml">
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat3" href="#"></a></li> 
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat8" href="#"></a></li>
 
                        </ul>
                    </li>

                    </ul>
            <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Materiel</span></label>
            <ul class="nav nav-list nav-left-ml">
            <li><label class="dropdown-item dropdown-toggle nav-toggle nav-header"><span>Appareils éléctroniques</span></label>
                        <ul class="nav nav-list nav-left-ml">
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat4" href="#"></a></li>  
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat5" href="#"></a></li>
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat9" href="#"></a></li>
                        <li><a class="nav-link px-2 link-secondary text-black categorie" id="cat7" href="#"></a></li>

                        </ul>
                    </li>
                        <li><a class="categorie" id="cat2" href="#"></a></li>

                    </ul>
            </ul>
        </li>
    </ul>
  </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>

            $('ul.nav-left-ml').toggle();
            $('label.nav-toggle span').click(function () {
            $(this).parent().parent().children('ul.nav-left-ml').toggle(300);
            var cs = $(this).attr("class");
            if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-right') {
                $(this).removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-down');
            }
            if(cs == 'nav-toggle-icon glyphicon glyphicon-chevron-down') {
                $(this).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-right');
            }
            });
            
            var nom;
            $('.nav-header').click(function() {
                $.ajax({
                    url: '../nom.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {id1 : "<?=$req[0]['idCat']?>", id2 : "<?=$req[1]['idCat']?>",id3 : "<?=$req[2]['idCat']?>",id4 : "<?=$req[3]['idCat']?>",id5 : "<?=$req[4]['idCat']?>",id6 : "<?=$req[5]['idCat']?>",id7 : "<?=$req[6]['idCat']?>",id8 : "<?=$req[7]['idCat']?>",id9 : "<?=$req[8]['idCat']?>"},
                    success: function(response){
                        console.log(response);
                        nom = response[0][1];
                        nom1 = response[1][1];
                        nom2 = response[2][1];
                        nom3 = response[3][1];
                        nom4 = response[4][1];
                        nom5 = response[5][1];
                        nom6 = response[6][1];
                        nom7 = response[7][1];
                        nom8 = response[8][1];

                        $("#cat1").html(nom);
                        $("#cat2").html(nom1);
                        $("#cat3").html(nom2);
                        $("#cat4").html(nom3);
                        $("#cat5").html(nom4);
                        $("#cat6").html(nom5);
                        $("#cat7").html(nom6);
                        $("#cat8").html(nom7);
                        $("#cat9").html(nom8);

                    }
                });
            })
        </script>

<!--<form id="formCategorie" action="index.php?Modules=Module_rendezVous&action=liste_tech" method="POST">
    <label>Selectionnez la categorie que vous souhaitez :</label></br>
    <?php
        $id = $req[1]["idCat"];
        $nomCategorie = $req[1]["nomCat"];
    ?>
        <div id="categorie" class="d-block">
            <button onclick="afficheSousCat()" name="categorie">
                Reparation
            </button>
        <div>
            
            <div id="div_categorie" class="d-none">
                <button type="submit" class="btn btn-outline-secondary" name="categorie" value=<?= $req[0]["idCat"] ?> name="categorie">
                    <?=$req[0]["nomCat"];?>
                </button>

                <button type="submit" class="btn btn-outline-secondary" name="categorie" value=<?= $id ?>>
                        <?= $nomCategorie; ?>
                </button>
            <div> -->

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
                    <label><?=$nom?> , <?=$prenom?></label>

                <?php
                }
                ?>
    <?php
    /*                           <div id="div_categorie" class="d-none">
                <button id="squeez" onclick="afficheSousCat1()" name="categorie">
                    <?=$req[0]["nomCat"];?>
                </button>
            <div>

            <div id="div_categorie1" class="d-none">
                <button type="submit" class="btn btn-outline-secondary" name="categorie" value=<?= $id ?>>
                        <?= $nomCategorie; ?>
                </button>
            <div>
    
    
    
    
    
    
    
    
    
    <form id="formCategorie" action="index.php?Modules=Module_rendezVous&action=liste_tech" method="POST">
    <label>Selectionnez la categorie que vous souhaitez :</label></br>
    <?php
        $id = $req[1]["idCat"];
        $nomCategorie = $req[1]["nomCat"];
    ?>
        <div id="categorie">
            <button id="squeez" onclick="afficheSousCat()" name="categorie">
                Reparation
            </button>
        <div>
            
            <div id="div_categorie" class="d-none">
                <button id="squeez" onclick="afficheSousCat1()" name="categorie">
                    <?=$req[0]["nomCat"];?>
                </button>
            <div>

            <div id="div_categorie1" class="d-none">
                <button type="submit" class="btn btn-outline-secondary" name="categorie" value=<?= $id ?>>
                        <?= $nomCategorie; ?>
    </button>
            <div>

    <?php
    
    ?>

</form>*/ 
    }

    
}
?>



