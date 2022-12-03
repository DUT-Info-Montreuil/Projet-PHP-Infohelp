<?php
require_once('controleurReparation.php');


class modReparation
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlReparation;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case "reparation":
                $this->control->getVue()->afficheReparation();
                break;
            default:
                break;
        }
    }
}