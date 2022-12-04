<?php
require_once('controleurReparation.php');


class ModuleReparation
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  Controleur_Reparation();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case "reparation":
                $this->control->getVue()->affichageDevis();
                break;
            default:
            echo "Ouais";
                break;
        }
    }
}