<?php
require_once('/home/etudiants/info/lchipan/local_html/SAE/Projet-PHP-Infohelp/SAE/Modules/modele/modeleLogin.php');
require_once('/home/etudiants/info/lchipan/local_html/SAE/Projet-PHP-Infohelp/SAE/Modules/View/viewLogin.php');

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
