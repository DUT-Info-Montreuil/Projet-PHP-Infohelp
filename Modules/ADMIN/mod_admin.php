<?php
require_once('ADMIN/controleurAdmin.php');
require_once('Login.php');


class moduleAdmin
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new controlAdmin;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";



        switch ($this->action) {
            case "Afficher_user":
                $this->control->listeUSer();
                break;
            case "retirerUser":
                $this->control->getModele()->suppUser();
                break;
            default:
                break;
        }
    }
}
