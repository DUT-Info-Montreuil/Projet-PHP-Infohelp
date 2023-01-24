<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_achatEtVente/controleurBoutique.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");


class modAchatEtVente
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlAchatEtVente;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        if (isset($_SESSION['idUtilisateur'])) {

        switch ($this->action) {
            case "boutique":
                $this->control->getVue()->affichageBoutique();
                break;
            case "achat":
                $this->control->getMateriels();
                break;
            case "afficher":
                $this->control->getDetailMateriel();
                break;
            case "acheter":
                $this->control->getModele()->acheterMateriel();
                break;
            case "vente":
                creation_token();
                $this->control->getVue()->affichageVente();
                break;    
            case "ajoutProduit":
                $this->control->getModele()->ajoutProduit();
                break;  
            default:
                break;
        }
    } else {
        header("Location: index.php?Modules=Module_connexion&action=form_connexion");
        die();        
    }
    }
}
/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/