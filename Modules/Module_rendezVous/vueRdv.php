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

<!--     <form action="index.php?Modules=Module_connexion&action=b1" method="POST" class="form-example">
                <div class="form-example">
                    <h2>Prenez un rendez vous</h2>
                    <p>Date</p>
                    <input type="date" name="date"  id="date" class="type" maxlength="255" required><br>
                    <input type="submit" name="send" id="send" required>
                </div>
            </form> -->


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
            $dateRdv=$rdv["userID"];

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
}
?>



