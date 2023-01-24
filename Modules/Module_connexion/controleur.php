
<?php
require_once('Modules/Module_connexion/modeleConnexion.php');
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
        creation_token();
        $this->getVue()->afficherFormChangerInfo($data);

    }
}

/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/