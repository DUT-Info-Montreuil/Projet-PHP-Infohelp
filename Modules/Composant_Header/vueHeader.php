<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");
class VueHeader extends vueGenerique
{
    public function __construct()
    {
        $this->afficherHeader();
    }
    public function afficherHeader()
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
                    <?php if (isset($_SESSION['image'])) {
                $image=$_SESSION['image'];    
            }else{
                $image="2022.12.11 - 08.06.19pm.png";
            }
?>
<?php
if (isset($_SESSION["mode"]) && $_SESSION["mode"] == 1) {
?>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

                <li class="nav-item"><a href="index.php?Modules=Module_accueil&action=Accueil" class="nav-link px-2 link-secondary">Accueil</a></li>
                <li class="nav-item"><a href="index.php?Modules=ADMIN&action=recherche_liste" class="nav-link px-2 link-secondary">Gestion des techniciens</a><br></li>
                <li><a href="index.php?Modules=ADMIN&action=Afficher_user" class="nav-link px-2 link-secondary">Gestion des utilisateurs</a><br></li>
                <li class="nav-item"><a href="index.php?Modules=Module_connexion&action=monProfil" class="nav-link px-2 link-primary text-white"><img id="profil" src="Modules/image_profil/<?=$image?>" alt=""></a></li>

            </ul>
 <?php } 
else if (isset($_SESSION["mode"]) && $_SESSION["mode"]  == 2) {
     ?>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

                <li class="nav-item"><a href="index.php?Modules=Module_accueil&action=Accueil" class="nav-link px-2 link-secondary">Accueil</a></li>
                <li class="nav-item"><a href="index.php?Modules=ADMIN&action=Afficher_rdv" class="nav-link px-2 link-secondary">Gestion des rendez vous</a><br></li>
                <li class="nav-item"><a href="index.php?Modules=Module_tutos&action=afficheFormTuto" class="nav-link px-2 link-primary text-white">Gestion des tutos</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_connexion&action=monProfil" class="nav-link px-2 link-primary text-white"><img id="profil" src="Modules/image_profil/<?=$image?>" alt=""></a></li>

</ul>
 <?php } 
else{
     ?>
        <img src="Modules/images/logo.PNG" alt="" id="logo" onlick="menutoggle()">
        <nav>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item"><a href="index.php?Modules=Module_accueil&action=Accueil" class="nav-link px-2 link-secondary">Accueil</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_rendezVous&action=liste_catégorie" class="nav-link px-2 link-primary text-white">Réparation</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_tutos&action=afficheCategorieVideo" class="nav-link px-2 link-primary text-white">Tutos</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_achatEtVente&action=boutique" class="nav-link px-2 link-primary text-white">Achat/Ventes</a></li>
                <li class="nav-item"><a href="index.php?Modules=Module_connexion&action=monProfil" class="nav-link px-2 link-primary text-white"><img id="profil" src="Modules/image_profil/<?=$image?>" alt=""></a></li>
            </ul>
        </nav>

 <?php } ?>
            
           

            <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['email'])) {
                echo'<a href="index.php?Modules=Module_connexion&action=deconnexion"type="button" class="btn btn-outline-primary me-2 ">Se deconnecter</a>';
                }
                if(!isset($_SESSION['email'])){
                echo'<a href="index.php?Modules=Module_connexion&action=form_connexion"type="button" class="btn btn-outline-primary me-2">Se connecter</a>';
                echo '<a href="index.php?Modules=Module_connexion&action=form_inscription"type="button" class="btn btn-primary">S\'inscrire</a>';
                }
            ?>    
            </div>
        </header>
    </div>
<br><br>
<?php
    }
}

?>