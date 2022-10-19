<?php
require_once('vue_generique.php');

class VueConnexion extends VueGenerique
{
    public function __construct() //Constructeur de la classe
    {
        parent::__construct();
    }


}
?>

<!DOCTYPE html>
    <html lang="fr">

    <body>
        <form action="index.php?action=connexion&module=connexion" method="POST" class="form-example">
                    <div class="form-example">
                        <h2>Connexion</h2>
                        <label for="connexion">Connexion: </label>
                        <input type="text" name="email" id="type" maxlength="255" required>
                        <input type="text" name="password" id="type" maxlength="255" required>
                        <input type="submit" name="send" id="send" required>
                    </div>
        </form>
            <style>
                form {
                    margin-bottom: 15px;
                    background: #f7f7f7;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .login-form h2 {
                     margin: 0 0 15px;
                }
                .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {
                font-size: 15px;
                font-weight: bold;
            }
            </style>
</body>
</html>
<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php

