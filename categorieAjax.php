<?php
    header('Content-Type: application/json; charset=utf-8');
require_once('Connexion.php');
    ConnexionUI::initConnexion();
    $id1 = $_POST["id1"];
    $id2 = $_POST["id2"];
    $id3 = $_POST["id3"];
    $id4 = $_POST["id4"];
    $id5 = $_POST["id5"];
    $id6 = $_POST["id6"];
    $id7 = $_POST["id7"];
    $id8 = $_POST["id8"];


    $req = ConnexionUI::getBDD()->prepare("select * from categories where idCat in ('$id1','$id2','$id3','$id4','$id5','$id6','$id7','$id8')");
    $req->execute();
    $resultat = $req->fetchAll();
    echo json_encode($resultat);


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>