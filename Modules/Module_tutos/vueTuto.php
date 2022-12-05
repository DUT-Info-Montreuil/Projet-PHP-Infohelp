<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class VueTuto extends vueGenerique
{
    public function __construct()
    {
    }

    public function afficher_categrorieVideo($data)
    {
        ?>
        <form action="index.php?Modules=Module_tuto&action=afficheListeTutos" method="POST" enctype="multipart/form-data">
        <label>Selectionnez la categorie qui vous concerne:</label></br>
        <?php
        foreach ($data as $categorie) { 
            $idCategorie=$categorie["idCategorieTuto"];
            $nomCategorie=$categorie["nomCategorie"];
            ?>
            <button name="categorie" value="<?= $idCategorie;?>">
            <?= $nomCategorie?>
            </button>
            <?php
        }
        
        ?> 

            <!-- Trigger/Open The Modal -->
            <button type="submit" class="btn btn-secondary px-4" id="ajoutTuto">Ajouter un nouveau Tuto</button>

            <!-- The Modal -->
            <div id="ModalTuto" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                <h3>Ajout d'un tuto</h3>
                <div class="form-group">
                    <label for="titreTuto">Entrez le titre du tuto</label>
                    <input type="text" class="form-control" name="titreTuto" id="titreTuto">
                    <label for="auteurTuto">Entrez l'auteur du tuto</label>
                    <input type="text" class="form-control" name="auteurTuto" id="auteurTuto">
                    <label for="lienTuto">Entrez l'id du lien de la video (uniquement)</label>
                    <input type="text" class="form-control" name="lienTuto" id="lienTuto" placeholder="ex:(KecoxVL2UDU)">
                    <label for="image">Mettre une miniature</label>
                    <input type="file" class="form-control" name="image" id = "image" accept=".jpg, .jpeg, .png">
                    <label for="choixCategorie">Choisissez la catégorie de la video</label>
                    <select name="choix" id="choixCategorie" class="form-select" aria-label="Default select example">
                    <option disabled selected>--Choix de la categorie--</option>
                    <?php foreach ($data as $cate) {  ?>

                        <option value="<?=$cate['idCategorieTuto']?>"><?=$cate['nomCategorie']?></option>
                        <?php
                    }               
                    ?> 
                        </select>
                </div>
                <div>
                    <input name="ajoutTutoBtn" type="submit" class="btn btn-primary px-4" value="Confirmer">
                </div>
            </div>

            <script>
            var modal = document.getElementById("ModalTuto");

            var btn = document.getElementById("ajoutTuto");

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
        </form>
        
   
<?php
    }


    public function afficher_Liste_Video($data)
    {
        ?>
        <form action="index.php?Modules=Module_tuto&action=afficheVideo" method="POST">
        <label>Selectionnez la video qui vous concerne:</label></br>
        <?php
        foreach ($data as $videos) { 
            $titreVideo=$videos["titre"];
            $lienVideo=$videos["lienVideo"];
            $miniature=$videos["miniature"];

            ?>
            <button name="lien" value="<?= $lienVideo?>">

            <img id="miniature" src="Module_tutos/images/<?=$miniature?>" alt="miniature de la video"></br>
            <?= $titreVideo?>

            </button>
            <?php
        }
        ?> 

        </form>

<?php
    }

    public function afficher_Video($data)
    {       
        ?>
                <iframe width="360" height="215" src="https://www.youtube.com/embed/<?php echo $data[0]['lienVideo'];?>" frameborder="0"  allowfullscreen></iframe><br>
                <label>Titre: <?= $data[0]['titre']?>
                <br>Vues: <?= $data[0]['nbVues']?>
                </label>
        <?php
        }


    

}
?>