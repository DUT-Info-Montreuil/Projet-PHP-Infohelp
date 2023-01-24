<?php
require_once('./Composant_Footer/controleur_footer.php');
require_once('./Connexion.php');



class moduleFooter
{

    public $controlleur;

    public function __construct(){
        ConnexionUI::initConnexion();
        $this->controlleur = new  controlleurFooter;
    }
    

}


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>