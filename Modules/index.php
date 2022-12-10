<?php
require_once('Module_connexion/mod_login.php');
require_once('Module_rendezVous/mod_Rdv.php');
require_once('ADMIN/mod_admin.php');
require_once('Module_accueil/mod_accueil.php');
require_once('Composant_Footer/module_footer.php');
require_once('Composant_Header/module_header.php');
require_once("vuegenerique.php");
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
    <link rel="stylesheet" href="CSS/style.css">

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
        $vue_gen = new vueGenerique();

        $header = new moduleHeader();


        if (isset($_GET["Modules"])) {
            $module = $_GET['Modules'];
            switch ($module) {
                case 'Module_connexion':
                    $module = new moduleLogin();
                    break;
                case 'Module_rendezVous':
                    $module = new moduleRdv();
                    break;
                case 'Module_accueil':
                    $module = new moduleAccueil();
                    break;
                case 'ADMIN':
                    $module = new moduleAdmin();
                    break;
                default:
                    # code...
                    break;
            }
        }
        ?>
        <style>
        <?php if($_SESSION['mode'] == 1){?>
          body {
          background-color: black;
          
          }
          body {
            color: green;
          }
          tbody{
            color: green;
          }
        <?php } ?>
        <?php if($_SESSION['mode'] == 2){?>
          body {
          background-color: #bababa;
          
          }
          body {
            color: red;
          }
        
          <?php } ?>
      </style>
    <?php
        $result = $vue_gen->getAffichage();

        echo "<a href=\"index.php?Modules=Module_rendezVous&action=prendreRdv\">Prendre un rdv</a><br>";
        echo "<a href=\"index.php?Modules=Module_rendezVous&action=annulerRdv\">Annuler un rdv</a><br>";
        


        echo $result;

        $footer = new moduleFooter();

        ?>

    </header>


</body>

</html>