<?php
require_once("Modules/vuegenerique.php");
class viewAchatEtVente extends vueGenerique
{
    public function __construct()
    {
    }
    public function affichageBoutique()
    {
?>

        <body>
            <main>
                <div class="lignes">
                </div>

                <section>
                    <br><br><br><br><br><br>
                    <p id="nosServices">Achat et Vente</p>
                    </h1>
                    <div id="d1">
                        <div class="card" style="width: 25rem;" id="c1">
                            <img src="images/vente.webp" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Achat</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="index.php?Modules=Module_achatEtVente&action=achat" class="btn btn-primary">Achat</a>
                            </div>
                        </div>
                        <div class="card" style="width: 25rem;" id="c2">
                            <img src="images/reparation.webp" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Vente</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="index.php?Modules=Module_achatEtVente&action=vente" class="btn btn-primary">Vente</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                
            </main>
        </body>
    <?php
    }



    public function affichageVente()
    {
    ?>
            <form action="index.php?Modules=Module_achatEtVente&action=ajoutProduit" method="POST" enctype="multipart/form-data">
                <!-- <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'> -->

                <tbody>

                    <div class="small-container">
                        <h2>Vente d'un produit</h2>
                        <label for="floatingInput">Nom du produit</label>                    
                        <input type="text" class="form-control" name="nomMateriel"></br>
                        <label for="floatingInput">Marque du produit</label>                    
                        <input type="text" class="form-control" name="marque"></br>
                        <label for="floatingInput">Description du produit</label>                    
                        <input type="text" class="form-control" name="description"></br>
                        <label for="floatingInput">Prix du produit</label>                    
                        <input type="text" class="form-control" name="prix"></br>
                        <label for="floatingInput">Couleur du produit</label>                    
                        <input type="text" class="form-control" name="couleur"></br>
                        <label for="floatingInput">Image du produit</label>                    
                        <input type="file" class="form-control" name="image" id = "image" accept=".jpg, .jpeg, .png"></br>
                    </div>
                    <button id="btnConfirmer" class="w-10 btn btn-lg btn-primary" type="submit">Confirmer</button>

                </tbody>
            </form>
            <style>
                form {
                    width: 550px;
                    height: 650px;
                    margin: auto;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }

                .form-floating {
                    margin-bottom: 15px;
                }
                #btnConfirmer{
                    float:right;
                }
            </style>
    <?php
    }




    public function affichageMaterielsEnVente($materiels)
    {
    ?>
        <table class="tableau-style">
            <form action="index.php?Modules=Module_achatEtVente&action=afficher" method="POST">
                <!-- <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'> -->
                <br><label>Tous les articles</label></br>

                <tbody>

                    <div class="small-container">
                        <h2>Matériels disponibles</h2>
                            <div class="row">
                                <div class="col-4">
                                <?php
                                    foreach ($materiels as $materiel) { ?>
                                    <div class="photoV">
                                        <!-- <img src="Modules/images/dell.jpg" alt=""> -->
                                        <img src="Modules/Module_achatEtVente/images_produits/<?= $materiel["image"] ?>" alt="">
                                        <h4><p><?= $materiel["nomMateriel"] ?></p></h4>
                                        <p><?= $materiel["prix"] ?>€</p>
                                        <button type="submit" name="idMateriel" value="<?= $materiel['idMateriel'] ?>">Afficher</button>
                                    </div>

                    <?php } ?>
                                </div>
                            </div>
                    </div>

                </tbody>
            </form>
        </table>

    <?php
    }

    public function afficheDetailMateriel($materiels)
    {

    ?>
        <section class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="card card-style1 border-0">
                            <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <img src="images/dell.jpg" alt="...">
                                    </div>
                                    <div class="col-lg-6 px-xl-10">
                                        <tbody>
                                            <?php
                                            foreach ($materiels as $materiel) { ?>
                                                <tr>
                                                    <!--                 <td><button name="idMateriel" value="<?= $materiel['idMateriel'] ?>">Ajouter dans panier</button></td> -->
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Nom :</span>
                                                        <td><?= $materiel['nomMateriel'] ?></td>
                                                    </li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Marque :</span>
                                                        <td><?= $materiel['marque'] ?></td>
                                                    </li>
                                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Couleur :</span>
                                                        <td><?= $materiel['couleur'] ?></td>
                                                    </li>
                                                </tr>
                                        </tbody>
                                    </div>
                                </div>
                                <form action="index.php?Modules=Module_achatEtVente&action=acheter" method="POST">
                                    <button id="achat" name="idMateriel" value="<?php echo $materiel['idMateriel'] ?>">Acheter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <span class="section-title text-primary mb-3 mb-sm-4">Description :</span>
                        <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600"></span>
                            <td><?= $materiel['description'] ?></td>
                        <?php } ?>
                    </div>
                </div>

            </div>
            </div>
        </section>
    <?php
    }


    public function affichageAchat()
    {
    ?>

        <body>
            <main>
                <div>
                    <h3>Que voulez vous vendre?</h3>
                </div>
            </main>
        </body>

<?php
    }
}
