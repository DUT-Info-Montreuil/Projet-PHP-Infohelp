<?php
session_start();
//user : dutinfopw201612
//passwd : rupapare
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="Modules/CSS/style.css">

    <title>InfoHelp</title>
</head>

<body>
    </div>
    <h1>TEST SAE</h1>
    <header>
        <nav>
            <p> menu </p>
        </nav>
        <?php
        require_once("Modules/vuegenerique.php");
        $vue_gen = new vueGenerique();

        require_once('Modules/Composant_Header/module_header.php');
        $header = new moduleHeader();


        if (isset($_GET["Modules"])) {
            $module = $_GET['Modules'];
            switch ($module) {
                case 'Module_connexion':
                    require_once('Modules/Module_connexion/mod_login.php');
                    $module = new moduleLogin();
                    break;
                case 'Module_rendezVous':
                    require_once('Modules/Module_rendezVous/mod_Rdv.php');
                    $module = new moduleRdv();
                    break;
                case 'Module_accueil':
                    require_once('Modules/Module_accueil/mod_accueil.php');
                    $module = new moduleAccueil();
                    break;
                case 'Module_achatEtVente':
                    require_once('Modules/Module_achatEtVente/mod_achatEtVente.php');
                    $module = new modAchatEtVente();
                    break;
                case 'Module_tutos':
                    require_once('Modules/Module_tutos/mod_tuto.php');
                    $module = new moduleTuto();
                    break;
                default:
                    # code...
                    break;
            }
        }


        $result = $vue_gen->getAffichage();

        echo $result;
        require_once('Modules/Composant_Footer/module_footer.php');
        $footer = new moduleFooter();

        ?>

    </header>


</body>