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

        if ($_SESSION["admin"] == 1) {
        

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
        else {
            header("Location: index.php?Modules=Module_accueil&action=Accueil");
        }
    }
}
