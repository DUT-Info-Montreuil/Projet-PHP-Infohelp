
<?php
session_start();
define("ROOT", __DIR__);
//user : dutinfopw201612


require_once "Connexion.php";
require_once("Modules/vuegenerique.php");
require_once ("controleur.php");

$controleur = new Controleur();

?>
<style>
<?php if($_SESSION['mode'] == 1){?>
  body {
  background-color: #B0E0E6;
  
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

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>


