
<?php
    header('Content-Type: application/json; charset=utf-8');
    require_once("Connexion.php");
    ConnexionUI::initConnexion();
    $id = $_POST["id"];
    $idRDV = $_POST["idRDV"];


    $req = ConnexionUI::getBDD()->prepare("select * from utilisateurs inner join rendezvous on utilisateurs.idUtilisateur = rendezvous.idUtilisateur inner join categories on rendezvous.idCategorie = categories.idCat where utilisateurs.idUtilisateur ='$id' and idRdv='$idRDV' ");
    $req->execute();
    $resultat = $req->fetch();
    echo json_encode($resultat);

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>