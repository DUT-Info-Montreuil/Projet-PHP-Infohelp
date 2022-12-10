<?php
require_once('controleurBoutique.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");


class modAchatEtVente
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlAchatEtVente;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case "boutique":
                $this->control->getVue()->affichageBoutique();
                break;
            case "achat":
                $this->control->getMateriels();
                break;
            case "afficher":
                $this->control->getDetailMateriel();
                break;
            case "acheter":
                $this->control->getModele()->acheterMateriel();
                break;
            case "vente":
                creation_token();
                $this->control->getVue()->affichageVente();
                break;    
            case "ajoutProduit":
                $this->control->getModele()->ajoutProduit();
                break;  
            default:
                break;
        }
    }
}