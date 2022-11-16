<?php
require_once('Composant_Header/vueHeader.php');

class controlleurHeader
{
    public $vue;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->vue = new  vueHeader;
    }
    

}
