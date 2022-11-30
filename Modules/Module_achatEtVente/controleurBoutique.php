<?php
require_once('modele_achatEtVente.php');
require_once('viewAchatEtVente.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");

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
    public function getDetailMateriel()
    {
        // creation_token();
        $resultat=$this->modele->get_Detail();
        $this->vue->afficheDetailMateriel($resultat);
    }


}
