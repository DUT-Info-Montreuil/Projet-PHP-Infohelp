<?php
require_once('vue_connexion.php');
require_once('modele_connexion.php');
class ContConnexion
{
    public $vue;
    public $modele;
    //private $action;

    public function __construct()
    {
        $this->vue = new VueConnexion;
        $this->modele = new ModeleConnexion();
    }

    public function getVue(){
        return $this->vue;
    }

    public function getModele(){
        return $this->modele;
    }

}