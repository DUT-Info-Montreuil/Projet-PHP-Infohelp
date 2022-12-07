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

                <div>

                    <label id="ville" for="floatingInput">Selectionner une ville :</label>
                    <select id="selectVille" name="city" class="form-select" aria-label="Default select example">
                        <option selected>ville à selectionner</option>
                        <option value="Paris">Paris</option>
                        <option value="Sarcelles">Sarcelles</option>
                        <option value="Nanterre">Nanterre</option>
                        <option value="Montreuil">Montreuil</option>
                        <option value="Creteil">Creteil</option>
                        <option value="Cergy">Cergy</option>
                    </select>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="postal_address" required>
                    <label for="floatingInput">Code Postal</label>
                </div>
                <button class="btn btn-primary" type="submit">S'inscrire</button>


            </form>
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