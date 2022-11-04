<?php
require_once('affiche_technicien/controleur.php');
require_once('Login.php');


class module_techniciens
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controleur_techniciens;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case 'recherche_liste':
                $this->control->getVue()->barre_de_recherche();
                break;
            case 'list':
                $this->control->listeDeLaRecherche();
            default:
                break;
        }
    }
}
