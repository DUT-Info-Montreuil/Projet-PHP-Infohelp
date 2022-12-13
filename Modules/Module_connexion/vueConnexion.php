<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
<?php
require_once("Modules/vuegenerique.php");

class VueConnexion extends vueGenerique
{
    public function __construct()
    {
    }
    public function formulaire_inscription()
    {

?>

        <!DOCTYPE html>



        <html lang="en">

        <body>
            <main>
                <form id="formInscription" action="index.php?Modules=Module_connexion&action=inscription" method="POST">
                    <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
                    <img class="mb-4" src="Modules/images/logo.PNG" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Inscription</h1>

                    <div class="form-floating">
                        <input required type="text" class="form-control" name="prenom">
                        <label for="floatingInput">Prenom</label>
                    </div>
                    <div class="form-floating">
                        <input required type="text" class="form-control" name="nom">
                        <label for="floatingInput">Nom</label>
                    </div>
                    <div class="form-floating">
                        <input required type="email" class="form-control" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div required class="form-floating">
                        <input required type="password" class="form-control" name="mot_de_passe">
                        <label for="floatingInput">Mot de passe</label>
                    </div>
                    <div class="form-floating">
                        <input required type="password" class="form-control" name="motsDePasse2">
                        <label for="floatingInput">Confirmer le mot de passe</label>
                    </div>
                    <div>

                        <label id="ville" for="floatingInput">Selectionner une ville :</label>
                        <select required id="selectVille" name="ville" class="form-select" aria-label="Default select example">
                            <option disabled selected>--ville à selectionner--</option>
                            <option value="Paris">Paris</option>
                            <option value="Sarcelles">Sarcelles</option>
                            <option value="Nanterre">Nanterre</option>
                            <option value="Montreuil">Montreuil</option>
                            <option value="Creteil">Creteil</option>
                            <option value="Cergy">Cergy</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input required type="text" class="form-control" name="adresse_postal">
                        <label for="floatingInput">Adresse postale </label>
                    </div>
                    <button class="btn btn-primary" type="submit">S'inscrire</button>
                </form>
            </main>
        </body>

        </html>




    <?php
    }
    public function formulaire_connexion($verif)
    {
    ?>
        <!DOCTYPE html>
        <html lang="fr">

        <body>
            <main>
                <form id="formConnexion" action="index.php?Modules=Module_connexion&action=connexion" method="POST">
                    <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
                    <img class="mb-4" src="Modules/images/logo.PNG" alt="" width="72" height="57">
                    <h1 class="h3 mb-3 fw-normal">Connexion</h1>

                    <div class="form-floating">
                        <input required name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="floatingInput">Adresse email</label>
                    </div>
                    <div class="form-floating">
                        <input required name="mot_de_passe" type="password" class="form-control" id="mot_de_passe" placeholder="Mot de passe">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
                    <span class="d-none" id="erreurVide"></span>
                    <a href="index.php?Modules=Module_connexion&action=motDePasse_Oublie">Mot de passe oublié ?</a>

                    <?php if ($verif == 1) { ?>
                        <div class="message">
                            <span id="erreur">Email ou mot de passe incorrect</span>
                        </div>
                    <?php   }  ?>

                </form>
            </main>
        </body>

        </html>
    <?php
    }

    public function formulaire_recuperation_motDePasse()
    {
    ?>
        <!DOCTYPE html>
        <html lang="fr">

        <!DOCTYPE html>
        <html lang="fr">

        <body>
            <main>
                <form id="box" action="index.php?Modules=Module_connexion&action=recuperation_MDP" method="POST">
                    <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'>
                    <p>Entrez votre adresse mail</p>
                    <div class="form-floating">
                        <input required name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                        <label for="floatingInput">Adresse email</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Envoyer</button><br>
                    <a href="index.php?Modules=Module_connexion&action=form_connexion">Retourner vers la page de connexion</a>
                </form>
            </main>

        </html>


    <?php
    }


    public function afficherFormChangerInfo($utilisateur)
    {
        $image = $utilisateur["image"];

    ?>

        <body>
            <main>
                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <form id="form" class="col-lg-12" action="index.php?Modules=Module_connexion&action=changement" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="token" value='<?= $_SESSION['token'] ?>'>
                                                <div class="upload">
                                                    <img src="Modules/image_profil/<?= $image; ?>" width=125 height=125 title="<?= $image; ?>">
                                                    <div class="round">
                                                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                                        <i class="fa fa-camera" style="color: #fff;"></i>
                                                    </div>
                                                </div>
                                                <h4><?= $utilisateur['prenom'] . " " . $utilisateur['nom'] ?></h4>
                                                <p class="text-muted font-size-sm"><?= $utilisateur['ville'] . ", " . $utilisateur['adresse_postale'] ?></p>
                                        </div>

                                        <hr class="my-4">
                                        <?php
                                        if ($_SESSION['mode'] == 0) {
                                        ?>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <a class="btn btn-outline-primary" href="index.php?Modules=Module_rendezVous&action=afficherListeRdv">Voir mes rendez-vous</a>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <a class="btn btn-outline-primary" href="index.php?Modules=Module_rendezVous&action=afficherFavoris">Voir mes techniciens favoris</a>
                                                </li>
                                            </ul>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-8">

                                <div class="card" id="infoChange">


                                    <div class="card-body">

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nom</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $utilisateur['nom'] ?>" name="nom">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Prenom</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $utilisateur['prenom'] ?>" name="prenom">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $utilisateur['email'] ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Ville</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $utilisateur['ville'] ?>" name="ville">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Adresse postale</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" class="form-control" value="<?= $utilisateur['adresse_postale'] ?>" name="adresse_postale">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="btnChangerInfo" type="submit" class="btn btn-primary px-4" value="Sauvegarder">




                                                <button type="submit" class="btn btn-secondary px-4" id="myBtn">modifier mon mot de passe</button>

                                                <div id="myModal" class="modal">

                                                    <div class="modal-content">
                                                        <span class="close">&times;</span>
                                                        <h3>Changement de mot de passe</h3>
                                                        <div class="form-group">
                                                            <label for="ancienMdp">Saisir l'ancien mot de passe</label>
                                                            <input type="password" class="form-control" name="ancienMdp" id="ancienMdp" placeholder="ancien mot de passe">
                                                            <label for="mdp1">Saisir le nouveau mot de passe</label>
                                                            <input type="password" class="form-control" name="mdp1" id="mdp1" placeholder="mot de passe">
                                                            <label for="mdp2">Confirmer le nouveau mot de passe</label>
                                                            <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="mot de passe">
                                                        </div>
                                                        <div>
                                                            <input name="changeMdpBtn" id="changeMdpBtn" type="submit" class="btn btn-primary px-4" value="Confirmer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </form>
                                    <script type="text/javascript">
                                        document.getElementById("image").onchange = function() {
                                            document.getElementById("form").submit();
                                        };
                                    </script>

                                    <script>
                                        var modal = document.getElementById("myModal");

                                        var btn = document.getElementById("myBtn");

                                        var span = document.getElementsByClassName("close")[0];

                                        btn.onclick = function(e) {
                                            e.preventDefault();

                                            modal.style.display = "block";
                                        }

                                        span.onclick = function() {
                                            modal.style.display = "none";
                                        }

                                        window.onclick = function(event) {
                                            if (event.target == modal) {
                                                modal.style.display = "none";
                                            }

                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </body>
<?php
    }
}

?>