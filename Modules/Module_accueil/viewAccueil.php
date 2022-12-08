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