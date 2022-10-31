<?php
require_once('Module_accueil/controleur.php');
require_once('Login.php');


class moduleAccueil
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlAccueil;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {

            case "Accueil":
                $this->control->getVue()->affichePageAccueil();
                break;
            case "b1":
                $this->control->getModele()->add_log_in();
                break;



            case "connexion":
                $this->control->getVue()->showConnection();
                break;
            case "b2":
                $canDisconnect = false;
                try {
                    $this->control->getModele()->connect();
                    $canDisconnect = true;
                } catch (Exception $e) {
                    $canDisconnect = false;

                    echo "dans l'exception veuillez vous connectez";
                    $this->control->getVue();
                }
                if ($canDisconnect == true) {
                }
                break;



            case "deconnexion":
                $this->control->getModele()->log_out();
                break;
            default:
                break;
        }
    }
}
