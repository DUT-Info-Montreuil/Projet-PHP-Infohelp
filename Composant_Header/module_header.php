<?php
require_once('./Composant_Header/controleur_header.php');
require_once('./Connexion.php');



class moduleHeader
{

    public $controlleur;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->controlleur = new  controleurHeader;
    }
    

}

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>