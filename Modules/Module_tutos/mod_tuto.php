<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_tutos/controleur_tuto.php');
require_once('Connexion.php');


class moduleTuto
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlTuto;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        if (isset($_SESSION['idUtilisateur'])) {
            switch ($this->action) {
            case "afficheCategorieVideo":
                $this->control->getCategorie();
                break;
            case "afficheListeTutos":
                $this->control->getListeVideos();
                break;
            case "afficheVideo":
                $lien=$_GET['lien'];
                $this->control->afficher_Video($lien);
                break;
            case "afficheFormTuto":
                $this->control->ajouterTuto();
                break;    
            case "ajoutTuto":
                if ($_SESSION["mode"] == 2) {
                $this->control->getModele()->ajoutTuto();
                }
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
