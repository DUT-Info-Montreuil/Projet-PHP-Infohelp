<?php
    header('Content-Type: application/json; charset=utf-8');
    require_once("Login.php");
    ConnexionUI::initConnexion();
    $id = $_POST["id"];
    $idRDV = $_POST["idRDV"];


    $req = ConnexionUI::getBDD()->prepare("select * from utilisateurs inner join rendezvous on utilisateurs.userID = rendezvous.idUtilisateur inner join categories on rendezvous.idCategorie = categories.idCat where userID ='$id' and idRdv='$idRDV' ");
    $req->execute();
    $resultat = $req->fetch();
    echo json_encode($resultat);
?>