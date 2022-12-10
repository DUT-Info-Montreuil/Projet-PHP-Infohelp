<?php
require_once('controleur.php');
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

            case "Profil":
                if(isset($_SESSION['email'])){
                    $this->control->getVue()->affichePageProfil();
                }else{echo "connectez vous";}
                break;
            
            default:
                break;
        }
    }
}
