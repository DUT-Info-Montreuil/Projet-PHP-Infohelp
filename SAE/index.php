<?php
require_once('Modules/module/mod_login.php');
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

    <?php

    if (isset($_SESSION['email'])) {
        echo '<a href="index.php?action=deconnexion">Se deconnecter</a>';
    } else {
        //echo "<a href=\"index.php?action=registration\">S'inscrire</a><br>";
        echo "<a href=\"Modules/View/viewLogin.php\">S'inscrire</a><br>";
        echo "<a href=\"index.php?action=connexion\">Se connecter</a><br>";
    }
    $module = new moduleLogin;

    ?>
</body>

</html>