<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("C:/wamp64/www/Projet-PHP-Infohelp/Modules/vuegenerique.php");
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
            <div class="l1"></div>
            <div class="l2"></div>
        </div>

        <div class="container-first">
            <h1></span><span>Bienvenu sur </span><span>InfoHelp </span><span><br>La plateforme qui traite votre problème numérique à coup portant et en un temps éclair</span><span><br>Mais sur toi l’Eternel se lève, Sur toi sa gloire apparaît. » </span><br><br><br><br><span>Nos services</span></h1>
            <div class="container-btns">
              <div>
                <div class="case c1" >
                  <div><img src="images/conseil.webp" alt="" width="19%"></div><br>
                  <button class="btn-first b1"><a href="#">Conseil</a></button>
                </div>
                <div class="case c2">
                  <div><img src="images/reparation.webp" alt="" width="19%"></div>
                  <button class="btn-first b2"><a href="#">Réparation</a></button>
                </div>
              </div>
              <div>
                <div class="case c3">
                  <div><img src="images/vente.webp" alt="" width="19%"></div>
                  <button class="btn-first b3"><a href="#">Vente</a></button>
                </div>
                <div class="case c4">
                  <div><img src="images/tuto.webp" alt="" width="19%"></div>
                  <button class="btn-first b4"><a href="#">Tutos</a></button>
                </div>
              </div>
            </div>
        </div>


        <ul class="medias">
            <li class="bulle"><a href="#"><img src="images/facebook.png" alt="Facebook" class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/twitter.png" alt="Twitter"  class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/instagram.png" alt="Instagram" class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/youtube.png" alt="Youtube" class="logo-medias"></a></li>
        </ul>
      </main>
  </body>
</html>
            <?php
    }
}

?>