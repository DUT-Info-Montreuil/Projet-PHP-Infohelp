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
    
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
    <div class="col mb-3">
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
    </div>
  </footer>

        <?php
    }
}

?>