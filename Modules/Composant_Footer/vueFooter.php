<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");
class VueFooter extends vueGenerique
{
  public function __construct()
  {
    $this->afficherFooter();
  }
  public function afficherFooter()
  {
?>

    <footer class="footer">
      <!--<div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      </a>
      <p class="text-muted">&copy; 2022</p>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Acceuil</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Catégories</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tutos</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">A propos de</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Nous suivre</h5>
        <ul class="medias">
            <li class="bulle"><a href="#"><img src="images/facebook.png" alt="Facebook" class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/twitter.png" alt="Twitter"  class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/instagram.png" alt="Instagram" class="logo-medias"></a></li>
            <li class="bulle"><a href="#"><img src="images/youtube.png" alt="Youtube" class="logo-medias"></a></li>
        </ul>
    </div> -->
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>Liens utiles</h3>
            <ul>
              <li>A</li>
              <li>B</li>
              <li>C</li>
              <li>D</li>
            </ul>
          </div>
          <div class="footer-col-2">
            <h3>Suivez nous</h3>
            <ul class="medias">
              <li class="bulle"><a href="#"><img src="Modules/images/facebook.png" alt="Facebook" class="logo-medias"></a></li>
              <li class="bulle"><a href="#"><img src="Modules/images/twitter.png" alt="Twitter" class="logo-medias"></a></li>
              <li class="bulle"><a href="#"><img src="Modules/images/instagram.png" alt="Instagram" class="logo-medias"></a></li>
              <li class="bulle"><a href="#"><img src="Modules/images/youtube.png" alt="Youtube" class="logo-medias"></a></li>
            </ul>
          </div>
        </div>
      </div>

    </footer>

<?php
  }
}

?>