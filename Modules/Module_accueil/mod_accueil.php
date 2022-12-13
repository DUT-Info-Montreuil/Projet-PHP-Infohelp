<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_accueil/controleur.php');
require_once('Connexion.php');

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
            
            default:
                break;
        }
    }
}
