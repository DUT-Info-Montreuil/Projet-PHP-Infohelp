<?php
    require_once("./Modules/Login.php");
    ConnexionUI::initConnexion();
    echo "hello";
    if (isset($_POST['input'])) {
     $input = $_POST['input'];
     $query =  ConnexionUI::getBDD()->prepare("SELECT * FROM `techniciens` where nom LIKE '{$input}%' ");
     $query->execute();
     if($query->rowCount() > 0){

     }else{
         echo "<h6 class='text-danger text center mt-3'> No data found</h6>";
     }
 }
    //$recup = $query->fetchAll();


?>