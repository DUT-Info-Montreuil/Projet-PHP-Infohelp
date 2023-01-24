
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
        $this->action = isset($_GET['action']) ? $_GET['action'] : "Accueil";
        switch ($this->action) {

            case "Accueil":
                $this->control->getVue()->affichePageAccueil();
                break;
            
            default:
                break;
        }
    }
}


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/