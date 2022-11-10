<?php
require_once('Module_connexion/controleur.php');
require_once('Login.php');


class moduleLogin
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlLogin;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {

            case "sign-up":
                $this->control->getVue()->showRegistration();
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
                    header("Location: index.php?Modules=Module_connexion&action=connexion");
                    die();
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
