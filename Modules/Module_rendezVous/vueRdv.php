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
        </label>
        
        <p><button>Envoyer</button></p>
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
            <button name="idRdv" value="<?php echo $idRdv;?>">
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
        <!-- <table>
            <tr>
                <th>
                    Id
                </th>
                <th>
                    Nom
                </th>
                <th>
                    Prenom
                </th>
                <th>
                    Catégorie
                </th>
            </tr>

        </table> -->
        <?php
        //while ($row = $req->fetch()) { 
        foreach ($req as $row) {
        ?>

            <tr>
                <br>
                <td> id : <?= $row['idTechnicien']; ?></td><br>
                <td> nom : <?= $row['nom']; ?></td><br>
                <td> prenom : <?= $row['prenom']; ?></td><br>
                <td> categorie :<?= $row["nomCat"];
                            } ?></td><br>


                <?php //} else {
                ?>

                <!-- <p>ERREUR DE SAISIE</p> -->
                <?php //}
                ?>

            </tr>
        <?php }

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
                    <button name="categorie" value=<?= $id ?>>
                        <?= $nomCategorie; ?>
                    </button>

                <?php
                }
                ?>

            </form>
    <?php
    }
}
?>



