<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class View extends vueGenerique
{
    public function __construct()
    {
    }
    public function showRegistration()
    {

?>

        <!DOCTYPE html>
        <html lang="en">

        <body>
            <form action="index.php?module=connexion&action=b1" method="POST" class="form-example">
                <div class="form-example">
                    <h2>Inscription</h2>
                    <p>Nom</p>
                    <input type="text" name="last_name" placeholder="nom(ex:Dupont)" class="type" maxlength="255" required><br>
                    <p>Prenom</p>
                    <input type="text" name="first_name" placeholder="prenom(ex:Alice)" class="type" maxlength="255" required><br>
                    <p>email</p>
                    <input type="text" name="email" placeholder="email" length="255" required><br>
                    <p>Mots de passe</p>
                    <input type="password" name="mdp" placeholder="mot de passe" id="type" maxlength="255" required><br>
                    <input type="submit" name="send" id="send" required>
                </div>
            </form>
            <style>
                .form-example {
                    width: 1500px;
                    margin: auto;
                }


                form {
                    text-align: center;
                    margin-bottom: 15px;
                    background: #f7f7f7;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }

                form input {
                    margin-bottom: 6px;
                    width: 250px;

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