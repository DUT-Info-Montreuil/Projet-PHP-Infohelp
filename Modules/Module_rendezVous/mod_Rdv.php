<?php
require_once('controleurRdv.php');
require_once('Login.php');


class moduleRdv
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controleurRdv;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        if (isset($_SESSION['email'])) {

            switch ($this->action) {

                case "prendreRdv":
                    $this->control->getVue()->affichageFormRdv();
                    break;

                case "ajoutRdv":
                    $this->control->getModele()->ajouterRdv();
                    break;

                case "afficherRdv":
                    $this->control->getRdv();
                    break;

                case "retirerRdv":
                    $this->control->getModele()->annulerRdv();
                    break;

                case "afficherListeRdv":
                    $this->control->getListeRdv();
                    break;

                case 'liste_tech':
                    $this->control->listeTechnicien();

                case 'liste_catégorie':
                    $this->control->listeCategorie();
                    break;

                case 'rdvTechnicien':
                    $this->control->getModele()->modifRdv();
                    break;

                case 'afficherFavoris':
                    $this->control->getTechnicienFavoris();
                    break;
                default:
                    break;
                case "afficherDevis":
                    $this->control->getVue()->affichageDevis();
                    break;
                case "devis":
                    $this->control->exportTraces();
                    break;
                case 'selectionVille':
                    $this->control->getVue()->afficherVille();
                    break;
                case 'voirTechnicien':
                    $this->control->getVue()->toutLesTechniciens($this->control->getModele()->getTechnicienParVille());
                    break;
            }
        } else {
            echo "connectez vous";
        }
    }
}
