<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");
class VueHeader extends vueGenerique
{
    public function __construct()
    {
        $this->afficherFooter();
    }
    public function afficherFooter()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>

            <div class="container">
                <header class=" text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom fixed-top">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                    <img src="Modules/images/logo.PNG" alt="" id="logo" onlick="menutoggle()">
                    <nav>
                        <ul class="nav col-12 col-md-auto mb-2 mb-md-0" id="MenuItems" style="margin-right: 50px;">
                            <li class="nav-item"><a href="index.php?Modules=Module_accueil&action=Accueil" class="nav-link px-2 link-secondary">Accueil</a></li>
                            <li class="nav-item"><a href="index.php?Modules=Module_rendezVous&action=liste_catégorie" class="nav-link px-2 link-primary text-white">Réparation</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 link-primary text-white">Tutos</a></li>
                            <li class="nav-item"><a href="index.php?Modules=Module_achatEtVente&action=boutique" class="nav-link px-2 link-primary text-white">Achat/Ventes</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 link-primary text-white">A propos</a></li>
                            <li class="nav-item"><a href="#" class="nav-link px-2 link-primary text-white"><img id="profil" src="images/profile.png" alt=""></a></li>
                        </ul>
                    </nav>


                    <div class="col-md-3 text-end">
                        <?php if (isset($_SESSION['email'])) {
                            echo '<a href="index.php?Modules=Module_connexion&action=deconnexion"type="button" class="btn btn-outline-primary me-2 ">Se deconnecter</a>';
                        }
                        if (!isset($_SESSION['email'])) {
                            echo '<a href="index.php?Modules=Module_connexion&action=connexion"type="button" class="btn btn-outline-primary me-2">Se connecter</a>';
                            echo '<a href="index.php?Modules=Module_connexion&action=sign-up"type="button" class="btn btn-primary">S\'inscrire</a>';
                        }
                        ?>
                    </div>
                </header>
            </div>
            
        </body>

        </html>

<?php
    }
}

?>