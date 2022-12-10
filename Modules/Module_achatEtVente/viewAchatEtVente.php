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
                <h1>
                    <p id="nosServices">Achat et Vente</p>
                </h1>
                <section class="card" style="width: 20rem;" id="c1">
                    <img src="Modules/images/achat.jpg" alt="" style="width: 100%;">
                    <div class="" style="width: 25rem;">

                        <div class="card-body">
                            <h5 class="card-title">Achat</h5>
                            <p class="card-text">Venez ici trouvé l'achat de vos rêves <br> au prix abordant! </p>
                            <a href="index.php?Modules=Module_achatEtVente&action=achat" class="btn btn-primary">Achat</a>
                        </div>
                    </div>
                </section>
                <section class="card" style="width: 25rem;" id="c2">
                    <img src="Modules/images/achat.png" alt="">
                    <div class="" style="width: 25rem;">

                        <div class="card-body">
                            <h5 class="card-title">Vente</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="index.php?Modules=Module_achatEtVente&action=vente" class="btn btn-primary">Vente</a>
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
        <main>
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
                        <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png"></br>
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

                #btnConfirmer {
                    float: right;
                }
            </style>
        </main>
    <?php


    }




    public function affichageMaterielsEnVente($materiels)
    {
    ?>
        <main>
            <section>
                <table class="tableau-style">
                    <form action="index.php?Modules=Module_achatEtVente&action=afficher" method="POST">
                        <!-- <input type="hidden" name="token" value='<?php echo $_SESSION['token'] ?>'> -->
                        <?php
                        foreach ($materiels as $materiel) { ?>
                            <section id="produit1" class="section-p1">
                                <div class="pro-container">
                                    <div>
                                        <div class="pro">
                                            <img src="Modules/Module_achatEtVente/images_produits/<?= $materiel["image"] ?>" alt="">
                                            <div class="des">
                                                <h5><?= $materiel["nomMateriel"] ?></h5>
                                                <div class="star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h4><?= $materiel["prix"] ?>€</h4>
                                            </div>
                                            <button type="submit" name="idMateriel" value="<?= $materiel['idMateriel'] ?>"><i class="fal fa-shopping-cart cart">Voir</i></button>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php } ?>
                    </form>
                </table>
            </section>
        </main>
    <?php
    }

    public function afficheDetailMateriel($materiels)
    {

    ?>
        <main>
            <section class="bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-4 mb-sm-5">
                            <div class="card card-style1 border-0">
                                <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                    <div class="row align-items-center">
                                        <?php
                                        foreach ($materiels as $materiel) { ?>
                                            <div class="col-lg-6 mb-4 mb-lg-0">
                                                <img src="Modules/Module_achatEtVente/images_produits/<?= $materiel['image'] ?>" alt="...">
                                            </div>
                                            <div class="col-lg-6 px-xl-10">
                                                <tbody>
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
        </main>
    <?php
    }


    public function affichageAchat()
    {
    ?>
<?php
    }
}
