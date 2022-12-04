<?php
require_once('modele_Reparation.php');
require_once('view_Reparation.php');
// require_once("Common/Bibliotheque_commune/Verification_creation_token.php");

class Controleur_Reparation
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new View_Reparation();
        $this->modele = new Modele_Reparation();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }


    /**
	 * Exporte les traces
	 *
	 * @return void
	 */
	public function exportTraces()
	{
		$this->load->model("Modele_Reparation");
		$traces = $this->Modele_Reparation->getTraces();
		
		$this->load->model("Export");
		$this->Export->exportTraces($traces);
	}


}
