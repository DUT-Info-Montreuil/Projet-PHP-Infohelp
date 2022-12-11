<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");

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
            <main>
                <form action="index.php?Modules=Module_connexion&action=b1" method="POST">
                    <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
                    <img class="mb-4" src="Modules/images/logo.PNG" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Inscription</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" name="first_name">
                        <label for="floatingInput">Prenom</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="last_name">
                        <label for="floatingInput">Nom</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password">
                        <label for="floatingInput">Mot de passe</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="motsDePasse2">
                        <label for="floatingInput">Confirmer le mot de passe</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="city">
                        <label for="floatingInput">Ville</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="postal_address">
                        <label for="floatingInput">Code Postal</label>
                    </div>
                    <button class="btn btn-primary" type="submit">S'inscrire</button>
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
            </main>
        </body>

        </html>




    <?php
    }
    public function showConnection($verif)
    {
    ?>
        <!DOCTYPE html>
        <html lang="fr">

        <body>
            <main>
                <form id="formConnexion" action="index.php?Modules=Module_connexion&action=b2" method="POST">
                    <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
                    <img class="mb-4" src="Modules/images/logo.PNG" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Connexion</h1>

            <div class="form-floating">
            <input required name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
            <input required name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="message()">Se connecter</button>
            <span class="d-none" id="erreurVide"></span> 

            <?php if($verif==1){ ?>
                <div class="message">
                    <span id="erreur">Email ou mot de passe incorrect</span> 
                </div>
        <?php   }  ?>

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
            </main>
        </body>

        </html>
    <?php
    }
}

?>