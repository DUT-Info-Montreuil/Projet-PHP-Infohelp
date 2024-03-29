<?php
require_once("./Modules/vuegenerique.php");
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
                <span class="cs-copyright_element">&copy; INFOHELP 2023 - Tous droits réservés</span><span class="cs-copyright_element"> - Mise à jour du site 24/01/2023</span>
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


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>