<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class ViewAccueil extends vueGenerique
{
    public function __construct()
    {
    }
    public function affichePageAccueil()
    {
?>
<style>
  <?php if($_SESSION['admin'] == 1){?>
    body {
    background: black;
    
    }
    body p{
      color: green;
    }
  <?php } ?>
  <?php if($_SESSION['admin'] == 2){?>
    body {
    background: gray;
    
    }
    body p{
      color: red;
    }
  <?php } ?>
</style>
            
  <body>
      <main>
        <div class="lignes">
        </div>

        <section>
        <div id="bienvenue">  
          <h1><br><br><br><p>Bienvenu sur InfoHelp <br>
            La plateforme qui traite votre problème numérique à coup portant et en un temps éclair<br>
            Mais sur toi l’Eternel se lève, Sur toi sa gloire apparaît. » </p>
        </div>  
            <br><br><br><br><br><br><p id="nosServices">Nos services</p></h1>
            <div id="d1">
              <div class="card" style="width: 25rem;" id="c1">
                <img src="images/conseil.webp" alt="" >
                  <div class="card-body">
                    <h5 class="card-title">Conseils</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Conseils</a>
                  </div>
              </div>
              <div class="card" style="width: 25rem;" id="c2">
                <img src="images/reparation.webp" alt="">
                <div class="card-body">
                  <h5 class="card-title">Réparations</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Reparations</a>
                </div>
              </div>
            </div>
            <div >
              <div class="card" style="width: 25rem;" id="c3">
                <img src="images/vente.webp" alt="">
                  <div class="card-body">
                    <h5 class="card-title">Ventes</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Ventes</a>
                  </div>
              </div>
              <div class="card" style="width: 25rem;" id="c4">
                <img src="images/tutoriels.png" alt="">
                <div class="card-body">
                  <h5 class="card-title">Tutoriels</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Tutoriels</a>
                </div>
              </div>
            </div>
        </section>
      </main>
  </body>
</html>
            <?php
    }
}

?>