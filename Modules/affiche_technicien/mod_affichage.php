<?php
require_once('affiche_technicien/controleur.php');
require_once('Login.php');


class moduleLogin
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controleur_techniciens;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {

            
            default:
                break;
        }
    }
}
