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

    public function getTechnicienFavoris()
    {
        $resultat=$this->modele->getFavoris();
        $this->vue->afficherTechnicienFavoris($resultat);
    }
}
