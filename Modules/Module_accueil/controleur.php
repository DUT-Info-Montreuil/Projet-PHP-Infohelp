<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_accueil/viewAccueil.php');

class controlAccueil
{
    public $vue;

    public function __construct()
    {
        $this->vue = new ViewAccueil();
    }
    public function getVue()
    {
        return $this->vue;
    }

}
