<?php
require_once('Module_tutos/controleur_tuto.php');
require_once('Login.php');


class moduleTuto
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlTuto;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case "afficheCategorieVideo":
                $this->control->getCategorie();

                break;
            case "afficheListeTutos":
                $this->control->getVideo();
                break;
            default:
                break;
        }
    }
}
