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
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
  <body>
      <main>
        <div class="lignes">
        </div>

        <section>
            <h1></span><span>Bienvenu sur </span><span>InfoHelp </span><span><br>La plateforme qui traite votre problème numérique à coup portant et en un temps éclair</span><span><br>Mais sur toi l’Eternel se lève, Sur toi sa gloire apparaît. » </span><br><br><br><br><span>Nos services</span></h1>
            <div id="d1">
              <div class="card" style="width: 25rem;" id="c1">
                <img src="images/conseil.webp" alt="" >
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Conseils</a>
                  </div>
              </div>
              <div class="card" style="width: 25rem;" id="c2">
                <img src="images/reparation.webp" alt="">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Reparations</a>
                </div>
              </div>
            </div>
            <div >
              <div class="card" style="width: 25rem;" id="c3">
                <img src="images/vente.webp" alt="">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Ventes</a>
                  </div>
              </div>
              <div class="card" style="width: 25rem;" id="c4">
                <img src="images/tuto.webp" alt="">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Tutoriels</a>
                </div>
              </div>
            </div>
        </section>


      <aside>
        <ul class="medias">
            <li class="bulle"><a href="#"><img src="images/facebook.png" alt="Facebook" class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/twitter.png" alt="Twitter"  class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/instagram.png" alt="Instagram" class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/youtube.png" alt="Youtube" class="logo-medias"></a></li>
        </ul>
      </aside>
      </main>
  </body>
</html>
            <?php
    }
}

?>