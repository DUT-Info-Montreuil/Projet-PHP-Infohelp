<?php
require_once('modele/modeleLogin.php');
require_once('View/viewLogin.php');

class controlLogin
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new viewLogin();
        $this->modele = new modeleLogin();
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
