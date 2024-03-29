
<?php
require_once('Modules/Module_achatEtVente/modele_achatEtVente.php');
require_once('Modules/Module_achatEtVente/viewAchatEtVente.php');
require_once("Common/Bibliotheque_commune/Verification_creation_token.php");

class controlAchatEtVente
{
    public $vue;
    public $modele;

    public function __construct()
    {
        $this->vue = new viewAchatEtVente();
        $this->modele = new modeleAchatEtVente();
    }
    public function getVue()
    {
        return $this->vue;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getMateriels()
    {
        $resultat=$this->modele->getListeMateriel();
        $this->vue->affichageMaterielsEnVente($resultat);
    }
    public function getDetailMateriel()
    {
        $resultat=$this->modele->get_Detail();
        $this->vue->afficheDetailMateriel($resultat);
    }


}
/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?> 
