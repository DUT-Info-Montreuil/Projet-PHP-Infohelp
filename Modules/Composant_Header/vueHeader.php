<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class VueHeader extends vueGenerique
{
    public function __construct()
    {
        $this->afficherFooter();
    }
    public function afficherFooter()
    {
?>
    
    <div class="container">
        
        <header class=" text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom fixed-top">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item"><a href="index.php?Modules=Module_accueil&action=Accueil" class="nav-link px-2 link-secondary">Accueil</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_rendezVous&action=liste_catégorie" class="nav-link px-2 link-primary text-white">Catgories</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-primary text-white">Tutos</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-primary text-white">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 link-primary text-white">A propos</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_accueil&action=Profil" class="nav-link px-2 link-primary text-white"><img id="profil" src="images/profile.png" alt=""></a></li>

            </ul>

            <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['email'])) {
                echo'<a href="index.php?Modules=Module_connexion&action=deconnexion"type="button" class="btn btn-outline-primary me-2 ">Se deconnecter</a>';
                }
                if(!isset($_SESSION['email'])){
                echo'<a href="index.php?Modules=Module_connexion&action=connexion"type="button" class="btn btn-outline-primary me-2">Se connecter</a>';
                echo '<a href="index.php?Modules=Module_connexion&action=sign-up"type="button" class="btn btn-primary">S\'inscrire</a>';
                }
            ?>    
            </div>
        </header>
    </div>

        <?php
    }
}

?>