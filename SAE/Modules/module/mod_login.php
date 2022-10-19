<?php
require_once('controleur.php');
require_once('login.php');


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
            case "registration":
                $this->control->vue->showRegistration();
                break;
            case "connect":
                //$this->control->vue->showConnection();
                break;
            case "b1":

                $this->control->getModele()->add_log_in();
                break;
            case "b2":
                $canDisconnect = false;
                try {
                    $this->control->getModele()->connect();
                    $canDisconnect = true;
                } catch (Exception $e) {
                    $canDisconnect = false;

                    echo "dans l'exception veuillez vous connectez";
                    $this->control->vue->showRegistration();
                }
                if ($canDisconnect == true) {
                    //$this->control->vue->showDisconnect();
                }
                break;
            case "disconnect":
                $this->control->getModele()->log_out();
                break;
            default:
                //echo "Dans le default";
                break;
        }
    }
}
