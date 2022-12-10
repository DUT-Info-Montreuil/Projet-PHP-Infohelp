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
        <body>
                <div class="container" style="max-width: 50%">
                <div class="text-center mt-5 mb-4">
                    <h2>Rechercher des utilisateurs</h2>
                </div>
                
                <input type="text" class="form-control" name="recherche" id="rechercheUtilisateurs" autocomplete="off" placeholder="Nom ou Prenom de l'utilisateur">
                </div>

            <div id="resultatRecherche"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#rechercheUtilisateurs").keyup(function(){
                            var input = $(this).val();
                            //alert(input);
                            if (input != "") {                                
                                $.ajax({
                                    url:"../rechercheUtilisateurs.php",
                                    type:"POST",
                                    data:{nom:input},

                                    success:function(data){
                                        $("#resultatRecherche").html(data);
                                    }
                                });
                            }
                            else {
                                $("#resultatRecherche").css("dipslay","none");
                            }
                        });
                    });

                </script>
                
        </body>

        </html>
    <?php
    }

    public function barre_de_recherche()
    {
    ?>
        <body>
                <div class="container" style="max-width: 50%">
                <div class="text-center mt-5 mb-4">
                    <h2>Rechercher des techniciens</h2>
                </div>
                
                <input type="text" class="form-control" name="recherche" id="rechercheEnDirect" autocomplete="off" placeholder="Nom ou prenom du technicien">
                </div>

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
                                    type:"POST",
                                    data:{nom:input},

                                    success:function(data){
                                        $("#resultatRecherche").html(data);
                                    }
                                });
                            }
                            else {
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

    public function afficherRdv($req)
    {
        
    ?>
    <form action="index.php?Modules=Module_rendezVous&action=retirerRdv" method="post">
        <label>Liste des rendez vous :</label></br>
 <?php
            foreach ($req as $rdv) {
                $idRdv = $rdv["idRdv"];
                $heure = $rdv["horaire"];
                $date = $rdv["dateRDV"];
                $nbUser = $rdv["idUtilisateur"];
            ?>
                <br><button class="btn btn-outline-secondary" name="idRdv" value="<?= $idRdv ?>">
                    <?= "Heure : " . $heure ?>
                    <?= "Date : " . $date  ?>
                    <?= "identifiant de l'utilisateur : " . $nbUser ?>
                </button>
            <?php } ?>
        </form>
<?php
    }
}

?>