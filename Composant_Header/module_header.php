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

?>