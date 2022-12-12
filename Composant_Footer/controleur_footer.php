<?php
require_once('vueFooter.php');

class controlleurFooter
{
    public $vue;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->vue = new  vueFooter;
    }
    

}
