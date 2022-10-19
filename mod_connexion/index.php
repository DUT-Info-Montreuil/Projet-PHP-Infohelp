<?php
    require_once('mod_connexion.php');
    require_once('vue_generique.php');
    session_start();
?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
    </head>
    <body>
        <?php
            if (isset($_GET["module"])){
                switch($_GET["module"]){
                    case "connexion" : 
                        $mod_connexion = new ModConnexion();
                    break; 
                }
            }
            $text = ob_get_clean();
        ?>
        <header>
            <?php
                if(isset($_SESSION['email'])){
                    echo "<a href=\"index.php?action=deconnexion&module=connexion\">Se Deconnecter</a></br>";
                }else{
                    echo "<a href=\"index.php?action=connecter&module=connexion\">Se Connecter</a></br>";
                }
            ?>
        </header>
        <?=$text?>
        <footer>
            <p>Copyright Geovany Germana - Tous droits réservés</p>
            <p>Adresse mail : ggermana@iut.univ-paris8.fr</p>
        </footer>
    </body>
</html>
