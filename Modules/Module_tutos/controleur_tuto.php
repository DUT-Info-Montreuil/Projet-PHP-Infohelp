<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once('Modules/Module_tutos/modeleTuto.php');
require_once('Modules/Module_tutos/vueTuto.php');

class controlTuto
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new VueTuto();
        $this->modele = new modeleTuto();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getCategorie()
    {
        $data = $this->modele->get_categrorieVideo();
        $res = $this->vue->afficher_categrorieVideo($data);

    }

    public function getListeVideos()
    {
        $tab = $this->modele->getListeVideos();
        $this->vue->afficher_Liste_Video($tab);
    }

    public function afficher_Video($data)
    {
        $tab = $this->modele->get_Video($data);
        $this->vue->afficher_Video($tab);
    }

    public function ajouterTuto()
    {
        $tab = $this->modele->get_categorieVideo();
        creation_token();
        $this->vue->ajouterTuto($tab);
    }
    
}
