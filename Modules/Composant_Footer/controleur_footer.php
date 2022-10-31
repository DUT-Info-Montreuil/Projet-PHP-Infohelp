<?php
require_once('Composant_Footer/vueFooter.php');

class controlleurFooter
{
    public $vue;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->vue = new  vueFooter;
    }
    

}
