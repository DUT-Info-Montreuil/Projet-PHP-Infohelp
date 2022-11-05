<?php
require_once('Module_accueil/modeleAccueil.php');
require_once('Module_accueil/viewAccueil.php');

class controlNotification
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new ViewAccueil();
        $this->modele = new modeleAccueil();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
}




