<?php
require_once('viewAccueil.php');

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
