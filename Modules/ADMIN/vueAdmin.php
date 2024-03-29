<?php
require_once("Modules/vuegenerique.php");
class vueAdmin extends vueGenerique
{
    public function __construct()
    {
    }

    
    public function afficheUser($data)
    {

        ?>
        <body>
            <main>
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
                                    url:"rechercheUtilisateurs.php",
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
                </main>
        </body>

        </html>
    <?php
    }

    public function barre_de_recherche_Techniciens()
    {
    ?>
        <body>
        <main>
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
                                    url:"recherchedirect.php",
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
               </main> 
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
                <br><a href="index.php?Modules=ADMIN&action=user$idUser=<?= $idTech ?>" class="btn btn-outline-secondary" >
                    <?= $nom . " " . $prenom ?>
            </a>
            <?php } ?>
        </form>
        </tr>
    <?php }

    public function afficherRdv($req)
    { 
    ?>
    <main>
        <label>Liste des rendez vous :</label></br>
 <?php
            foreach ($req as $rdv) {
                $idRdv = $rdv["idRdv"];
                $heure = $rdv["horaire"];
                $date = $rdv["dateRDV"];
                $nomUtilisateur = $rdv['nom'];
                $prenomNomUtilisateur = $rdv[0];
                $adresseUtilisateur = $rdv['adresse_postale'];
                $categorieReparation = $rdv['idCategorie'];
            ?>                
                <br><br>
                    <?= "Categorie : " . $categorieReparation ?>
                    <?= ", Heure : " . $heure ?>
                    <?= ", Date : " . $date  ?>
                    <?= ", Rendez-vous pris par : " . $nomUtilisateur ?>
                    <?= ", Lieu : " . $adresseUtilisateur ."."?><br>
                    <a href="index.php?Modules=Module_rendezVous&action=retirerRdv&idRdv=<?= $idRdv ?>"class="btn btn-danger" name="idRdv" >Annuler le Rdv</a>
            <?php } ?>
        </main>

<?php
    }
}
/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>

