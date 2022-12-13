<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
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
