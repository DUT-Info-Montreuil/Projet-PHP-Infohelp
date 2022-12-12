<?php
require_once('modeleAdmin.php');
require_once('vueAdmin.php');

class controlAdmin
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new vueAdmin();
        $this->modele = new modeleAdmin();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }

    public function listeUSer()
    {
        $this->vue->afficheUser($this->modele->afficheUser());
    }
    public function listeRdv()
    {
        $this->vue->afficherRdv($this->modele->afficherRdv());
    }
    public function listeTechnicien()
    {
        $this->vue->afficher($this->modele->getlistTechnicien());
    }
}
