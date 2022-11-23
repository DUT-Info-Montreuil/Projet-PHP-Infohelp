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
    }

    
}
?>



