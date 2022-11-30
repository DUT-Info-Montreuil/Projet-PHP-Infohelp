<?php
require_once('modeleAccueil.php');
require_once('viewAccueil.php');

class controlAccueil
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
