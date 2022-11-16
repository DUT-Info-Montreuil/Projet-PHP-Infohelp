<?php
require_once("vuegenerique.php");
class viewAchatEtVente extends vueGenerique
{
    public function __construct()
    {
    }
    public function affichageBoutique()
    {
?>
            
  <body>
      <main>
        <div class="lignes">
        </div>

        <section>
            <br><br><br><br><br><br><p id="nosServices">Achat et Vente</p></h1>
            <div id="d1">
              <div class="card" style="width: 25rem;" id="c1">
                <img src="images/vente.webp" alt="" >
                  <div class="card-body">
                    <h5 class="card-title">Achat</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="index.php?Modules=Module_achatEtVente&action=vente" class="btn btn-primary">Conseils</a>
                  </div>
              </div>
              <div class="card" style="width: 25rem;" id="c2">
                <img src="images/reparation.webp" alt="">
                <div class="card-body">
                  <h5 class="card-title">Vente</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Reparations</a>
                </div>
              </div>
            </div>
            </div>
        </section>
      </main>
  </body>
</html>
            <?php
    }
    public function affichageMaterielsEnVente($materiels)
    {
?>
        <table class="tableau-style">
        <form action="index.php?Modules=Module_achatEtVente&action=acheter" method="POST">
            <label>Tous les articles</label></br>
            <thead>
              <tr>
                <th>Acheter</th>
                <th>Nom</th>
                <th>Quantite</th>
              </tr>
            </thead>
            
            <tbody>

                <?php
                foreach($materiels as $materiel){?>
                <tr>
                <td><input name="acheter" type="button" value="<?=$materiel['idMateriel']?>"></td></input>
                <td><?= $materiel["nomMateriel"]?></td>
                <td><?=$materiel["quantite"]?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        </form>



    
        
            <?php
    }

    
}

?>