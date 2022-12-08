<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");
class ViewAccueil extends vueGenerique
{
    public function __construct()
    {
    }
    public function affichePageAccueil()
    {
?>
            
  <body>
      <main>
        <!-- <div class="lignes">
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
                  <a href="index.php?Modules=Module_reparations&action=reparation" class="btn btn-primary">Reparations</a>
                </div>
              </div>
            </div>
            <div >
              <div class="card" style="width: 25rem;" id="c3">
                <img src="images/vente.webp" alt="">
                  <div class="card-body">
                    <h5 class="card-title">Ventes</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="index.php?Modules=Module_achatEtVente&action=boutique" class="btn btn-primary">Ventes</a>
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
        </section> -->
        <div class="header">
                    <div class="row">
                        <div class="col-2">
                            <h1>Give Your Workout A New Style !</h1>
                            <p>Lorem ipsum dolor sit amet. Et cnis odio ab rerum aut suscipit necessitatibus vel suscipit recusandae. Vel harum sint aut similique dolores</p>
                            <a href="index.php?Modules=Module_rendezVous&action=liste_catégorie" class="btn btn-primary bouton">Nos spécialistes &#8594;</a>
                            <!-- <a href="index.php?Modules=Module_achatEtVente&action=vente" class="btn btn-primary">Achat&#8594;</a> -->
                        </div>
                        <div class="col-2">
                            <img src="Modules/images/conseil.webp" alt="">
                        </div>
                    </div>
                </div>

                <div class="categories">
                    <div class="small-container">
                        <div class="row">
                            <div class="col-3">
                                <a href="index.php?Modules=Module_achatEtVente&action=boutique"><img src="Modules/images/ventes.webp" alt="">Achat et Ventes</a>
                            </div>
                            <div class="col-3">
                            <a href="index.php?Modules=Module_reparations&action=reparation"><img src="Modules/images/reparation.webp" alt="">Réparations</a>
                            </div>
                            <div class="col-3">
                                <a href="#"><img src="Modules/images/acceuil.webp" alt="">Tutos</a>
                            </div>
                        </div>
                    </div>
                </div>
      </main>
  </body>
</html>
            <?php
    }
}

?>