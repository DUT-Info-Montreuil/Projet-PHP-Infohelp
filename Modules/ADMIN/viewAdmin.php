<!-- Template ou utiliser les variables stocker dans le modeles -->
<?php
require_once("vuegenerique.php");
class vueAdmin extends vueGenerique
{
    public function __construct()
    {
    }
    public function afficheUser($data)
    {

?>
        <form action="index.php?Modules=ADMIN&action=retirerUser" method="post">
            <label>Liste des utilisateurs, cliquer sur celui que vous souhaitez supprimer :</label></br>

            <?php
            foreach ($data as $user) {
                $idUser = $user["userID"];
                $nom = $user["first_name"];
                $prenom = $user["last_name"];


            ?>
                <button class="btn btn-outline-secondary" name="idUser" value="<?= $idUser ?>">
                    <?= $nom . " " . $prenom ?>
                </button>
            <?php } ?>
        </form>

    <?php
    }

    public function barre_de_recherche()
    {
    ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
        </head>
        <body>
            
        </body>
        </html>
        <body>
            <!--<form action="index.php?Modules=ADMIN&action=liste_tech" method="post">-->
                <!--<label> rechercher </label>-->
                <div class="container" style="max-width: 50%">
                <div class="text-center mt-5 mb-4">
                    <h2>Rechercher des techniciens</h2>
                </div>
                
                <input type="text" class="form-control" name="recherche" id="rechercheEnDirect" autocomplete="off" placeholder="Nom du technicien">
                </div>
                <!--<input type="submit" value="sub">-->
            <!--</form>-->

            <div id="resultatRecherche"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#rechercheEnDirect").keyup(function(){
                            var input = $(this).val();
                            //alert(input);
                            if (input != "") {
                                $.ajax({
                                    url:"../recherchedirect.php",
                                    methode:"POST",
                                    data:{input:input},

                                    success:function(data){
                                        $("#resultatRecherche").html(data);
                                    }
                                });
                            }else {
                                $("#resultatRecherche").css("dipslay","none");
                            }
                        });
                    });

                </script>
                
        </body>

        </html>
    <?php
    }
    public function afficher($req)
    {
    ?>

        <form action="index.php?Modules=ADMIN&action=user" method="post">
            <label>Liste des techniciens rechercher : </label></br>

            <?php
            foreach ($req as $tech) {
                $idTech = $tech["idTechnicien"];
                $nom = $tech["nom"];
                $prenom = $tech["prenom"];


            ?>
                <br><button class="btn btn-outline-secondary" name="idUser" value="<?= $idTech ?>">
                    <?= $nom . " " . $prenom ?>
                </button>
            <?php } ?>
        </form>
        </tr>
    <?php }

    public function showConnection()
    {
    ?>

<?php
    }
}

?>