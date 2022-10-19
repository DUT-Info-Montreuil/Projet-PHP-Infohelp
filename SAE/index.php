<?php
require_once('/home/etudiants/info/lchipan/local_html/SAE/Projet-PHP-Infohelp/SAE/Modules/module/mod_login.php');
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
    $module = new moduleLogin;

    if (isset($_SESSION['email'])) {
        echo '<a href="index.php?action=deconnexion">Se deconnecter</a>';
    } else {
        echo "<a href=\"index.php?action=registration\">S'inscrire</a><br>";
        echo "<a href=\"index.php?action=connexion\">Se connecter</a><br>";
    }

    ?>
</body>

</html>