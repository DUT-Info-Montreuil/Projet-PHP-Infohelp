<?php
require_once('modeleRdv.php');
require_once('vueRdv.php');

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
}
