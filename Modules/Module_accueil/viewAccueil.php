<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
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

        <h1>Page d'accueil<h1>

        <?php
    }
}

?>