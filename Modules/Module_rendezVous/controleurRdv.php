<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_rendezVous/modeleRdv.php');
require_once('Modules/Module_rendezVous/vueRdv.php');

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

    public function getListeRdv()
    {
        $resultat=$this->modele->getListeRdv();
        $this->vue->afficherRdvUtilisateur($resultat);
    }

    public function getRdv()
    {
        $resultat=$this->modele->getRdv();
        $this->vue->afficherRdv($resultat);
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
	
    public function getTechnicienFavoris()
    {
        $resultat=$this->modele->getFavoris();
        $this->vue->afficherTechnicienFavoris($resultat);
    }

    public function afficherTechnicienParVille()
    {
        $resultat=$this->modele->getVilles();
        $this->vue->afficherSelectionVille($resultat);
    }
    
}
