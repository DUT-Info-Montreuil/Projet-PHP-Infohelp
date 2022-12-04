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
        var_dump($req);
        ?>

         
 

        <div class="container py-5">
            <h1 class="mb-4">Multilevel Dropdown</h1>
            <div class="dropdown">
                
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> Menu </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li class="dropdown dropend">
                        <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logiciel</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" id="cat1" href="#"></a></li>
                            <li><a class="dropdown-item" id="cat2" href="#"></a></li>
                </ul>
                    </li>
                    <li class="dropdown dropend">
                        <!-- Default dropstart button -->
                        <div class="btn-group dropstart">
                        <a class="dropdown-item dropdown-toggle" href="#" id="multilevelDropdownMenu1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Materiel</a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" id="cat3" href="#"></a></li>
                            <li><a class="dropdown-item" id="cat2" href="#"></a></li>                        
                        </ul>
                        </div>
                        
                    </li>
                </ul>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            let dropdowns = document.querySelectorAll('.dropdown-toggle')
            dropdowns.forEach((dd)=>{
                dd.addEventListener('click', function (e) {
                    var el = this.nextElementSibling
                    el.style.display = el.style.display==='block'?'none':'block'
                })
            })
            var nom;
            $('.dropdown-toggle').click(function() {
                $.ajax({
                    url: '../nom.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {id1 : "<?=$req[0]['idCat']?>", id2 : "<?=$req[1]['idCat']?>",id3 : "<?=$req[2]['idCat']?>"},
                    success: function(response){
                        console.log(response);
                        nom = response[0][1];
                        nom1 = response[1][1];
                        nom2 = response[2][1];

                        $("#cat1").html(nom);
                        $("#cat2").html(nom1);
                        $("#cat3").html(nom2);
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



