<?php
session_start();
define("ROOT", __DIR__);
//user : dutinfopw201612


require_once "Connexion.php";
require_once("Modules/vuegenerique.php");
require_once ("controleur.php");

$controleur = new Controleur();


?>


