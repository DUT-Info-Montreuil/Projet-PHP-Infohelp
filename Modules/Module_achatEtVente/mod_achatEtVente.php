<?php
require_once('Module_achatEtVente/controleurBoutique.php');


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
            case "vente":
                $this->control->getMateriels();
                break;
            case "acheter":
                var_dump($_POST["idMateriel"]);
                $this->control->getModele()->acheterMateriel();
                break;
            default:
                break;
        }
    }
}