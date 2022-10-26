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
            <form action="index.php?Modules=Module_connexion&action=b1" method="POST" class="form-example">
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
        <form action="index.php?Modules=Module_connexion&action=b2" method="POST">
    <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
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

  
            </style>
        </body>

        </html>
<?php
    }
}

?>