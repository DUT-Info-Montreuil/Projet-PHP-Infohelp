<?php
require_once('Modules/ADMIN/controleurAdmin.php');
require_once('Connexion.php');


class moduleAdmin
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new controlAdmin;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";


        switch ($this->action) {

            case "Afficher_user":
                if ($_SESSION["mode"] == 1) {
                    $this->control->listeUSer();
                }
                break;
            case "retirerUtilisateur":
                if ($_SESSION["mode"] == 1) {
                    $this->control->getModele()->suppUtilisateur();
                }
                break;
            case "retirerTechnicien":
                if ($_SESSION["mode"] == 1) {
                    $this->control->getModele()->suppTechnicien();
                }
                break;

            case "Afficher_rdv":
                if ($_SESSION["mode"] == 2) {
                    $this->control->listeRdv();
                }
                break;
            case 'recherche_liste':
                if ($_SESSION["mode"] == 1) {
                    $this->control->getVue()->barre_de_recherche_Techniciens();
                }
                break;
            case 'liste_tech':
                if ($_SESSION["mode"] == 1) {
                    $this->control->listeTechnicien();
                }
                break;
            default:
                header("Location: index.php?Modules=Module_accueil&action=Accueil");

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