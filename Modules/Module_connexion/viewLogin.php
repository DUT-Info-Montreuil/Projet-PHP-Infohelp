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
        <input type="text" class="form-control" name="first_name">
        <label for="floatingInput">Prenom</label>
        </div>
        <div class="form-floating">
        <input type="text" class="form-control" name="last_name" >
        <label for="floatingInput">Nom</label>
        </div>
        <div class="form-floating">
        <input type="email" class="form-control" name="email">
        <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" name="password" >
        <label for="floatingInput">Mot de passe</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" name="motsDePasse2" >
        <label for="floatingInput">Confirmer le mot de passe</label>
        </div>
        <div class="form-floating">
        <input type="text" class="form-control" name="city">
        <label for="floatingInput">Ville</label>
        </div>
        <div class="form-floating">
        <input  type="text" class="form-control" name="postal_address">
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
                .form-floating{
                    margin-bottom:15px;
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
        <form id="formConnexion" action="index.php?Modules=Module_connexion&action=b2" method="POST">
            <img class="mb-4" src="images/logo.PNG" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Connexion</h1>

            <div class="form-floating">
            <input required name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
            <input required name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" >Se connecter</button>
            
            <div id="messageErreur" class="d-none">
                <div class="message">
                    <span class="danger" id="danger">Veuillez rensigner tous les champs</span> 
                </div>
            </div>

        </form>

            <style>
                form {
                    width: 500px;
                    margin: auto;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .form-floating{
                    margin-bottom:15px;
                }

  
            </style>
        </body>

        </html>
<?php
    }



    public function afficherFormChangerInfo($utilisateur)
    {
        $image = $utilisateur["image"];

?>


<div class="container">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
                                <form id = "form" class="col-lg-12" action="index.php?Modules=Module_connexion&action=changement" method="POST" enctype="multipart/form-data">
                                <div class="upload">
                                    <img src="image_profil/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
                                    <div class="round">
                                        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                                        <i class = "fa fa-camera" style = "color: #fff;"></i>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a class="btn btn-outline-primary" href="index.php?Modules=Module_rendezVous&action=afficherListeRdv">Voir mes rendez-vous</a>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<a class="btn btn-outline-primary" href="index.php?Modules=Module_rendezVous&action=afficherFavoris">Voir mes techniciens favoris</a>
								</li>
							</ul>
						</div>
					</div>
				</div>


				<div class="col-lg-8">

					<div class="card">


						<div class="card-body">

							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Nom</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?=$utilisateur['last_name']?>" name="last_name">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Prenom</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?=$utilisateur['first_name']?>" name="first_name">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?=$utilisateur['email']?>" name="email">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Ville</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?=$utilisateur['city']?>" name="city">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Code Postal</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?=$utilisateur['postal_address']?>" name="postal_address">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input name="btnChangerInfo" type="submit" class="btn btn-primary px-4" value="Sauvegarder">
                                    <!-- Trigger/Open The Modal -->
                                    <button type="submit" class="btn btn-secondary px-4" id="myBtn">modifier mon mot de passe</button>

                                    <!-- The Modal -->
                                    <div id="myModal" class="modal">

                                    <!-- Modal content -->
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
                                    <script src="JS/javaScript.js"></script>
								</div>
                                
							</div>
						</div>
                    </form>
                    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
					</div>
				</div>
			</div>
		</div>
	</div>


    <?php
        }
    
}

?>