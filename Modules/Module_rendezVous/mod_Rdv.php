<?php
require_once('Module_rendezVous/controleurRdv.php');
require_once('Login.php');


class moduleRdv
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controleurRdv;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {

            case "prendreRdv":
                $this->control->getVue()->affichageFormRdv();
                break;
            case "ajoutRdv":
                $this->control->getModele()->ajouterRdv();
                break;
            case "retirerRdv":
                $this->control->getModele()->annulerRdv();
                break;
            case "annulerRdv":
                $this->control->getRdv();
                break;
            default:
                break;
        }
    }
}
