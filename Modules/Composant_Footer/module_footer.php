<?php
require_once('controleur_footer.php');
require_once('Connexion.php');



class moduleFooter
{

    public $controlleur;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->controlleur = new  controlleurFooter;
    }
    

}

?>