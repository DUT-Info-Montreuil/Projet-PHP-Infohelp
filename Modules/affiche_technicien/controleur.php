<?php
require_once('affiche_technicien/modele.php');
require_once('affiche_technicien/vue.php');

class controleur_techniciens
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new vue_techniciens();
        $this->modele = new modele_techniciens();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function listeDeLaRecherche()
    {
        $this->vue->afficherTechnicien($this->modele->getlistTechnicien());
    }
    public function listeCategorie()
    {
        $this->vue->afficherCat($this->modele->getCategories());
    }
}
