<?php
require_once('Modules/ADMIN/modeleAdmin.php');
require_once('Modules/ADMIN/vueAdmin.php');

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


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/