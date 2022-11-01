<?php 
require_once("vuegenerique.php");

class vue_techniciens extends vueGenerique{

public function __construct()
    {
    }
    public function barre_de_recherche(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="post">
            <label> rechercher </label>
            <input type="text" name="recherche">
            <input type="submit" value="sub">
            </form>
        </body>
        </html>
        <?php
    }
    public function listeTechnicien(){
        //select pour recupérer les données
        foreach ($variable as $key => $value) {
            # code...
        }
    }







}

?>