
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


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/