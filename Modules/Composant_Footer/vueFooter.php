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


    <!--     <div class="col mb-3">
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
    <footer class="footer">
      <div class="partie1" style="color : grey">
        <div class="row">
          <div class="footer-col-1">
            <h3>Suivez nous</h3>
            <div class="bulle">
              <a><img src="Modules/images/facebook.png" alt="Facebook" class="logo-medias"></a>&ensp;
              <a href="#"><img src="Modules/images/twitter.png" alt="Twitter" class="logo-medias"></a>&ensp;
              <a href="#"><img src="Modules/images/instagram.png" alt="Instagram" class="logo-medias"></a>&ensp;
              <a href="#"><img src="Modules/images/youtube.png" alt="Youtube" class="logo-medias"></a>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="partie2">
        <div class="u-wrapper">
          <div class="cs-copyright" style="text-align: center;">
            <div class="cs-copyright-row">
              <div class="cs-copyright-col">
                <span class="cs-copyright_element">&copy; INFOHELP 2022 - Tous droits réservés</span><span class="cs-copyright_element"> - Mise à jour du site 09/12/2022</span>
                <p class="cs-copyright_separator"></p>
              </div>
              <span class="cs-copyright_element">Réalisé par Daniel Lucas et Geovany</span>
            </div>
          </div>
        </div>
      </div>
    </footer>
<?php
  }
}

?>