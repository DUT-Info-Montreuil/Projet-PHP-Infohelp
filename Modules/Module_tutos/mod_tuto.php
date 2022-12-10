<?php
require_once('controleur_tuto.php');
require_once('Login.php');


class moduleTuto
{
    public $control;
    public $action;
    public function __construct()
    {
        ConnexionUI::initConnexion();
        $this->control = new  controlTuto;
        $this->action = isset($_GET['action']) ? $_GET['action'] : "rien";
        switch ($this->action) {
            case "afficheCategorieVideo":
                $this->control->getCategorie();
                break;
            case "afficheListeTutos":
                if(isset($_POST['ajoutTutoBtn'])){
                    $this->control->getModele()->ajoutTuto();
                }else{
                    $this->control->getListeVideos();
                }
                break;
            case "afficheVideo":
                $lien=$_POST['lien'];
                $this->control->afficher_Video($lien);
                break;
            case "ajoutTuto":
                break;

                default:
                    break;
        }
    }
}
