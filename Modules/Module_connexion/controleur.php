<?php
require_once('modeleLogin.php');
require_once('viewLogin.php');

class controlLogin
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new View();
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
