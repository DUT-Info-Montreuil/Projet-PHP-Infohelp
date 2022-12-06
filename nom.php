<?php
    header('Content-Type: application/json; charset=utf-8');
    require_once("./Modules/Login.php");
    ConnexionUI::initConnexion();
    $id1 = $_POST["id1"];
    $id2 = $_POST["id2"];
    $id3 = $_POST["id3"];

    $req = ConnexionUI::getBDD()->prepare("select * from categories where idCat in ('$id1','$id2','$id3')");
    $req->execute();
    $resultat = $req->fetchAll();
    echo json_encode($resultat);
?>