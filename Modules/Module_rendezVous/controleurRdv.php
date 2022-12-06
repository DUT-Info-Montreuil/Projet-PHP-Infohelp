<?php
require_once('Module_rendezVous/modeleRdv.php');
require_once('Module_rendezVous/vueRdv.php');

class controleurRdv
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new VueRdv();
        $this->modele = new modeleRdv();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getRdv()
    {
        $resultat=$this->modele->getListeRdv();
        $this->vue->afficherRdvUtilisateur($resultat);
    }

    public function listeTechnicien()
    {
        $res=$this->modele->getlistTechnicien();
        $this->vue->afficherTechnicien($res);
    }
    
    public function listeCategorie()
    {
        $resultat=$this->modele->getCategories();
        $this->vue->afficherCat($resultat);
    }


        /**
	 * Exporte les traces
	 *
	 * @return void
	 */
	public function exportTraces()
	{
		$traces = $this->getModele()->getTraces();
		
	}

    public function affichageDevis()
	{
		$traces = $this->getModele();
		
	}
}
