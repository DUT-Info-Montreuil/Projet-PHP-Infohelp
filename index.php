<?php
session_start();
define("ROOT", __DIR__);
//user : dutinfopw201612
//passwd : rupapare
?>



        <?php
        require_once("Modules/vuegenerique.php");
        $vue_gen = new vueGenerique();

        require_once('Composant_Header/module_header.php');
        $header = new moduleHeader();


        if (isset($_GET["Modules"])) {
            $module = $_GET['Modules'];
            switch ($module) {
                case 'Module_connexion':
                    require_once('Modules/Module_connexion/mod_connexion.php');
                    $module = new moduleConnexion();
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
                case 'ADMIN':
                    require_once('Modules/ADMIN/mod_admin.php');
                    $module = new moduleAdmin();
                    break;    
                default:
                    
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

        echo $result;
        require_once('Composant_Footer/module_footer.php');
        $footer = new moduleFooter();

        ?>


