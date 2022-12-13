<?php
require_once('./Composant_Header/vueHeader.php');

class controleurHeader
{
    public $vue;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->vue = new  vueHeader;
    }
    

}
