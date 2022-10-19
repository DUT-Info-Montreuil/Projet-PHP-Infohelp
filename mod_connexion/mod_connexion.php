<?php
require_once('cont_connexion.php');
require_once('connexion.php');


class ModConnexion
{
    public $controleur;
    public $action;

    public function __construct()
    {
      
        ConnexionUSER::initConnexion();
        $this->controleur = new ContConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "connecter";


        switch ($this->action) {
            case "connexion":
                $this->controleur->getModele()->connexion();
                break;
            case "deconnexion":
                 $this->controleur->getModele()->deconnexion();
        }
    }

    /*récupérer l’action demandée par l’utilisateur, et appeler la bonne méthode du
contrôleur du module joueurs*/
}
