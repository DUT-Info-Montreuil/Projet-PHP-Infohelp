<?php
require_once('Module_achatEtVente/modele_achatEtVente.php');
require_once('Module_achatEtVente/viewAchatEtVente.php');

class controlAchatEtVente
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new viewAchatEtVente();
        $this->modele = new modeleAchatEtVente();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getMateriels()
    {
        $resultat=$this->modele->getListeMateriel();
        $this->vue->affichageMaterielsEnVente($resultat);
    }

}
