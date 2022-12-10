<?php
require_once('vueHeader.php');

class controlleurHeader
{
    public $vue;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->vue = new  vueHeader;
    }
    

}
