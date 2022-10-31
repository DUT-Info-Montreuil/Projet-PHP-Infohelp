<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("C:/wamp64/www/Projet-PHP-Infohelp/Modules/vuegenerique.php");
class ViewAccueil extends vueGenerique
{
    public function __construct()
    {
    }
    public function affichePageAccueil()
    {
?>
        <!DOCTYPE html>
        <html lang="en">
        <body>

        <p>Page d'accueil<p>

        <?php
    }
}

?>