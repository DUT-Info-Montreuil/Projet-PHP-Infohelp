<?php
require_once('Module_connexion/mod_login.php');
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
    <title>Document</title>
</head>

<body>
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

                default:
                    # code...
                    break;
            }
        }

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