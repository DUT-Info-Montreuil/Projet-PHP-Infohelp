<?php
require_once("C:\wamp64\www\SAE\Projet-PHP-Infohelp\Modules\Module_connexion\mod_login.php");
require_once("C:\wamp64\www\SAE\Projet-PHP-Infohelp\Modules\affiche_technicien\mod_affichage.php");

require_once("vuegenerique.php");
session_start();
//user : dutinfopw201612
//passwd : rupapare
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
   <!--  <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a type="button" class="btn btn-outline-primary me-2">Login</a>
                <button type="button" class="btn btn-primary">Sign-up</button>
            </div>
        </header> -->
    </div>
    <h1>TEST SAE</h1>
    <header>
        <nav>
            <p> menu </p>
        </nav>
        <?php

        $vue_gen = new vueGenerique();

        if (isset($_GET["Modules"])) {
            $module = $_GET['Modules'];
            switch ($module) {
                case 'Module_connexion':
                    $module = new moduleLogin();
                    break;
                case 'affiche_technicien' :
                    $module = new module_techniciens();
                    break;
                default:
                    # code...
                    break;
            }
        }
        
        echo '<a href="index.php?Modules=affiche_technicien&action=recherche_liste">list</a><br>';


        $result = $vue_gen->getAffichage();

        if (isset($_SESSION['email'])) {
            echo '<a href="index.php?Modules=Module_connexion&action=deconnexion">Se deconnecter</a><br>';
        } else {

            echo "<a href=\"index.php?Modules=Module_connexion&action=sign-up\">S'inscrire</a><br>";
            echo "<a href=\"index.php?Modules=Module_connexion&action=connexion\">Se connecter</a><br>";
        }

        echo $result;

        ?>

    </header>



    <footer>
        <p>Footer de la page </p>
    </footer>
</body>

</html>