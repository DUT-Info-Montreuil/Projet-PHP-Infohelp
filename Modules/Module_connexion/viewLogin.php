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
            <form action="index.php?Modules=Module_connexion&action=b1" method="POST">
                <img class="mb-4" src="images/logo.PNG" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Inscription</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" name="first_name" required>
                    <label for="floatingInput">Prenom</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="last_name" required>
                    <label for="floatingInput">Nom</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" required>
                    <label for="floatingInput">Mot de passe</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="city" required>
                    <label for="floatingInput">Ville</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="postal_address" required>
                    <label for="floatingInput">Code Postal</label>
                </div>
                <button class="btn btn-primary" type="submit">S'inscrire</button>

                <!-- <div>

                    <input type="checkbox" name="checkbox">
                    <label for="floatingInput">Je suis un technicien</label>
                </div> -->
            </form>

            <style>
                form {
                    width: 500px;
                    margin: auto;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }

                .form-floating {
                    margin-bottom: 15px;
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
            <form action="index.php?Modules=Module_connexion&action=b2" method="POST">
                <img class="mb-4" src="images/logo.PNG" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Connexion</h1>

                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
            </form>

            <style>
                form {
                    width: 500px;
                    margin: auto;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }

                .form-floating {
                    margin-bottom: 15px;
                }
            </style>
        </body>

        </html>
<?php
    }
}

?>