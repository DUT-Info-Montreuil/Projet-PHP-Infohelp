<?php
require_once("vuegenerique.php");
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
            <br><br><br><br><br><br><p id="nosServices">Achat et Vente</p></h1>
            <div id="d1">
              <div class="card" style="width: 25rem;" id="c1">
                <img src="images/vente.webp" alt="" >
                  <div class="card-body">
                    <h5 class="card-title">Achat</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="index.php?Modules=Module_achatEtVente&action=vente" class="btn btn-primary">Conseils</a>
                  </div>
              </div>
              <div class="card" style="width: 25rem;" id="c2">
                <img src="images/reparation.webp" alt="">
                <div class="card-body">
                  <h5 class="card-title">Vente</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Reparations</a>
                </div>
              </div>
            </div>
            </div>
        </section>
      </main>
  </body>
</html>
            <?php
    }
    public function affichageMaterielsEnVente($materiels)
    {
?>
        <table class="tableau-style">
        <form action="index.php?Modules=Module_achatEtVente&action=afficher" method="POST">
            <br><label>Tous les articles</label></br>
            <thead>
              <tr>
                <th>Acheter</th>
                <th>Nom</th>
                <th>Quantite</th>
              </tr>
            </thead>
            
            <tbody>

                <?php
                foreach($materiels as $materiel){?>

                <tr>
<!--                 <td><button name="idMateriel" value="<?=$materiel['idMateriel']?>">Ajouter dans panier</button></td> -->
                    <td><button name="idMateriel" value="<?=$materiel['idMateriel']?>">Afficher</button></td>
                    <td><?= $materiel["nomMateriel"]?></td>
                    <td><?=$materiel["quantite"]?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        </form>



    
        
            <?php
    }

    public function afficheDetailMateriel($materiels){

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
                                <!-- <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">John mark Doe Kyzer</h3>
                                    <span class="text-primary">Coach</span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Marque:</span> </li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Nom de modèle:</span> 10 Years</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Taille de l'écran:</span> edith@mail.com</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Couleur:</span> www.example.com</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> 507 - 541 - 4567</li>
                                </ul>
                                <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                    <li><a href="#!">dfezrf<i class="ti-twitter-alt"></i></a></li>
                                    <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                    <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                </ul> -->                                  
                                    <tbody>
                                        <?php
                                        foreach($materiels as $materiel){?>

                                        <tr>
                        <!--                 <td><button name="idMateriel" value="<?=$materiel['idMateriel']?>">Ajouter dans panier</button></td> -->
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Nom :</span><td><?=$materiel['nomMateriel']?></td></li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Marque :</span><td><?= $materiel['marque']?></td></li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Couleur :</span><td><?=$materiel['couleur']?></td></li>
                                            <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Description :</span><td><?=$materiel['description']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">A propos</span>
                    <p>Edith is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">
                        <div class="mb-4 mb-sm-5">
                            <span class="section-title text-primary mb-3 mb-sm-4">Skill</span>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Driving range</div>
                                    <div class="col-6 text-end">80%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Short Game</div>
                                    <div class="col-6 text-end">90%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Side Bets</div>
                                    <div class="col-6 text-end">50%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium mb-3" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-6">Putting</div>
                                    <div class="col-6 text-end">60%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress progress-medium" style="height: 4px;">
                                <div class="animated custom-bar progress-bar slideInLeft bg-secondary" style="width:60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    }
}
?>