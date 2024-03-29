
<?php
require_once('Modules/Module_connexion/controleur.php');
require_once('Connexion.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");


class moduleConnexion
{
    public $controleur;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->controleur = new controleurConnexion;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case "form_inscription":
                creation_token();
                $this->controleur->getVue()->formulaire_inscription();
                break;
            case "inscription":
                $this->controleur->getModele()->inscription();
                break;
            case "motDePasse_Oublie":
                creation_token();
                $this->controleur->getVue()->formulaire_recuperation_motDePasse();
                break;
            case "recuperation_MDP":
                $this->controleur->getModele()->recuperationMDP();
                break;
            case "form_connexion":
                creation_token();
                $this->controleur->getVue()->formulaire_connexion($verif = 0);
                break;

            case "connexion":
                $verifConnexion = $this->controleur->getModele()->connexion();

                if ($verifConnexion == 1) {
                    $this->controleur->getVue()->formulaire_connexion($verif = $verifConnexion);
                } else {
                    header("Location: index.php?Modules=Module_accueil&action=Accueil");
                    die();
                }
                break;
            case "deconnexion":
                $this->controleur->getModele()->deconnexion();
                break;

            case "monProfil":
                if (isset($_SESSION['idUtilisateur'])) {
                    $this->controleur->getUtilisateurAchanger();
                } else {
                    header("Location: index.php?Modules=Module_connexion&action=form_connexion");
                    die();
                }
                break;

            case "changement":
                $this->controleur->getModele()->modifInformationsUtilisateur();
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