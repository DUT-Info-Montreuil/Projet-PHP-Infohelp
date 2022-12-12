<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("Modules/vuegenerique.php");
class VueTuto extends vueGenerique
{
    public function __construct()
    {
    }

    public function afficher_categrorieVideo($data)
    {


?>

        <body>
            <main>
                    <label>Selectionnez la categorie qui vous concerne:</label></br>
                    <?php
                    foreach ($data as $categorie) {
                        $idCategorie = $categorie["idCategorieTuto"];
                        $nomCategorie = $categorie["nomCategorie"];
                    ?>
                        <a href="index.php?Modules=Module_tutos&action=afficheListeTutos&categorie=<?= $idCategorie; ?>" class="btn btn-secondary" name="categorie">
                            <?= $nomCategorie ?>
                    </a>
                    <?php
                    }

                    ?>
            </main>
        </body>

    <?php
    }



    public function ajouterTuto($data)
    {


?>
        <body>
            <main>
                <form action="index.php?Modules=Module_tutos&action=ajoutTuto" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="token" value='<?= $_SESSION['token'] ?>'>    

                            <h3>Ajout d'un tuto</h3>
                            <div class="form-group">
                                <label for="titreTuto">Entrez le titre du tuto</label>
                                <input type="text" class="form-control" name="titreTuto" id="titreTuto">
                                <label for="auteurTuto">Entrez l'auteur du tuto</label>
                                <input type="text" class="form-control" name="auteurTuto" id="auteurTuto">
                                <label for="lienTuto">Entrez l'id du lien de la video (uniquement)</label>
                                <input type="text" class="form-control" name="lienTuto" id="lienTuto" placeholder="ex:(KecoxVL2UDU)">
                                <label for="image">Mettre une miniature</label>
                                <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg, .png">
                                <label for="choixCategorie">Choisissez la catégorie de la video</label>
                                <select name="choix" id="choixCategorie" class="form-select" aria-label="Default select example">
                                    <option disabled selected>--Choix de la categorie--</option>
                                    <?php foreach ($data as $cate) {  ?>

                                        <option value="<?= $cate['idCategorieTuto'] ?>"><?= $cate['nomCategorie'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <input name="ajoutTutoBtn" type="submit" class="btn btn-primary px-4" value="Confirmer">
                            </div>
                    
                </form>
            </main>
        </body>

    <?php
    }

    public function afficher_Liste_Video($data)
    {
    ?>
    

        <body>
            <main>
                    <label>Selectionnez la video qui vous concerne:</label></br>
                    <?php
                    foreach ($data as $videos) {
                        $titreVideo = $videos["titre"];
                        $lienVideo = $videos["lienVideo"];
                        $miniature = $videos["miniature"];

                    ?>
                    <div id="row-tuto">
                        <div id="col-1-tuto">
                        <a href="index.php?Modules=Module_tutos&action=afficheVideo&lien=<?= $lienVideo ?>">     
                            <img id="miniature" src="Modules/Module_tutos/images/<?= $miniature ?>" alt="miniature de la video"></br>
                            <?= $titreVideo ?></a>
                        </div>
                    </div>
                    </div>
                    <?php
                    }
                    ?>
            </main>
        </body>

    <?php
    }

    public function afficher_Video($data)
    {
    ?>

        <body>
            <main>
                <iframe width="360" height="215" src="https://www.youtube.com/embed/<?php echo $data[0]['lienVideo']; ?>" frameborder="0" allowfullscreen></iframe><br>
                <label>Titre: <?= $data[0]['titre'] ?>
                    <br>Vues: <?= $data[0]['nbVues'] ?>
                </label>
            </main>
        </body>
<?php
    }
}
?>