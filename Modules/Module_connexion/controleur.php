<?php
require_once('modeleConnexion.php');
require_once('vueConnexion.php');

class controleurConnexion
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new VueConnexion();
        $this->modele = new modeleConnexion();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getUtilisateurAchanger()
    {
        $data=$this->modele->getUtilisateur();
        $this->getVue()->afficherFormChangerInfo($data);

    }
}
