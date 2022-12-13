<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_rendezVous/controleurRdv.php');
require_once('Connexion.php');


class moduleRdv
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controleurRdv;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        if (isset($_SESSION['idUtilisateur'])) {

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


                case "afficherListeRdv":
                    $this->control->getListeRdv();
                    break;

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
                case 'selectionTechParVille':
                    $this->control->afficherTechnicienParVille();
                    break;

                case 'voirTechnicien':
                    $this->control->getVue()->afficherTechnicien($this->control->getModele()->getTechnicienParVille());
                    break;
            }
        } else {
            header("Location: index.php?Modules=Module_connexion&action=form_connexion");
            die();        
        }
    }
}
