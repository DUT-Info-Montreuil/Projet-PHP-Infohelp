
<?php
class Controleur
{
    private $modele;
    private $module;
    public $resultat;
    public function __construct()
    {
        require_once("modele.php"); // pour les Faille include 
        $this->modele = new Modele();
        $this->module = isset($_GET['Modules']) ? $_GET['Modules'] : 'Module_accueil';
        $this->exec();
    }

    public function exec()
    {

        $vue_gen = new vueGenerique();

        require_once('Composant_Header/module_header.php');
        $header = new moduleHeader();
        
        switch ($this->module) {

                case 'Module_connexion':
                    require_once('Modules/Module_connexion/mod_connexion.php');
                    $module = new moduleConnexion();
                    break;
                case 'Module_rendezVous':
                    require_once('Modules/Module_rendezVous/mod_Rdv.php');
                    $module = new moduleRdv();
                    break;
                case 'Module_accueil':
                    require_once('Modules/Module_accueil/mod_accueil.php');
                    $module = new moduleAccueil();
                    break;
                case 'Module_achatEtVente':
                    require_once('Modules/Module_achatEtVente/mod_achatEtVente.php');
                    $module = new modAchatEtVente();
                    break;
                case 'Module_tutos':
                    require_once('Modules/Module_tutos/mod_tuto.php');
                    $module = new moduleTuto();
                    break;
                case 'ADMIN':
                    require_once('Modules/ADMIN/mod_admin.php');
                    $module = new moduleAdmin();
                    break;    
                default:
                    
                    break;
            }
        
        $result = $vue_gen->getAffichage();

        echo $result;
        require_once('Composant_Footer/module_footer.php');
        $footer = new moduleFooter();
}
}


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/



        ?>


