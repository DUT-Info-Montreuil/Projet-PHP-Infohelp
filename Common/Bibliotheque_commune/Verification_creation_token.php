
<?php
//fichier APPELLER DANS cont_connexio, modele_connexion

    //fonction qui creer un token unique pour un formulaire par ex
     function creation_token() {
        $bytes = random_bytes(20);//on genere un nombre random
        $_SESSION['token'] = bin2hex($bytes);//Convertit le nb random en représentation hexadécimale
        $_SESSION['token_date'] = time();// Retourne l'horodatage UNIX actuel
    }

     function verification_token() {
        return strcmp($_POST['token'], $_SESSION['token']) == 0 && time() - $_SESSION['token_date'] < 600;
    }

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>