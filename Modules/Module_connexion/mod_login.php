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
                $this->control->getVue()->showConnection($verif=0);
                break;
            case "b2":
                $canDisconnect = false;
                $verifConnexion=$this->control->getModele()->connect();

                if($verifConnexion==1){
                    $this->control->getVue()->showConnection($verif=$verifConnexion);
                }else{
                    header("Location: index.php?Modules=Module_accueil&action=Accueil");
                    die();
                }


                

                break;
            case "deconnexion":
                $this->control->getModele()->log_out();
                break;

            case "monProfil":
                $this->control->getUtilisateurAchanger();
                break;  
                
            case "changement":
                $this->control->getModele()->modifInformationsUtilisateur();
                break;         
            default:
                break;
        }
    }
}
