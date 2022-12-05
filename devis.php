<?php
    header('Content-Type: application/json; charset=utf-8');
    require_once("./Modules/Login.php");
    ConnexionUI::initConnexion();
    $id = $_POST["id"];


    $req = ConnexionUI::getBDD()->prepare("select * from utilisateurs where userID ='$id'");
    $req->execute();
    $resultat = $req->fetchAll();
    echo json_encode($resultat);
?>