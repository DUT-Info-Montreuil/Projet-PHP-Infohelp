<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vue_generique.php");
class View extends vueGenerique
{
    public function __construct()
    {
    }
    public function showRegistration()
    {

?>

        <body>
            <form action="index.php?Modules=Module_connexion&action=b1" method="POST" class="form-example">
                <div class="form-example">
                    <h2>Inscription</h2>
                    <input type="text" name="last_name" placeholder="nom(ex:Dupont)" id="type" maxlength="255" required>
                    <input type="text" name="first_name" placeholder="prenom(ex:Alice)" id="type" maxlength="255" required>
                    <input type="text" name="email" placeholder="email" length="255" required>
                    <input type="password" name="password" placeholder="mot de passe" id="type" maxlength="255" required>
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

                .form-control,
                .btn {
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
    <?php
    }
    public function showConnection()
    {
    ?>
        <!DOCTYPE html>
        <html lang="fr">

        <body>
            <form action="index.php?Modules=Module_connexion&action=b2" method="POST" class="form-example">
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

                .form-control,
                .btn {
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
<?php
    }
}

?>