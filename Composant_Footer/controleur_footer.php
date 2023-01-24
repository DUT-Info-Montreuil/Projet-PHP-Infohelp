<?php
require_once('./Composant_Footer/vueFooter.php');

class controlleurFooter
{
    public $vue;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->vue = new  vueFooter;
    }
    

}


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/