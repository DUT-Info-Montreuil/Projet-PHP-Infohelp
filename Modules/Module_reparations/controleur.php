<?php
require_once('modele_reparation.php');
require_once('viewReparation.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");

class controlReparation
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new viewReparation();
        $this->modele = new modeleReparation();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }


}
