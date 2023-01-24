
<?php
require_once('Connexion.php');
    ConnexionUI::initConnexion();
    //echo "hello";
    if (isset($_POST['nom'])) {
     $input = $_POST['nom'];
     $query =  ConnexionUI::getBDD()->prepare("SELECT * FROM `utilisateurs` WHERE `nom` LIKE '%{$input}%' and `mode`=0 or `prenom` LIKE '%{$input}%'and `mode`=0 ");
     $query->execute();
     if($query->rowCount() > 0){?>
        <table class="table table-bordered table-striped mt-4">

            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Nom
                    </th>
                    <th>
                        Prenom
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Adresse
                    </th>
                    <th>
                        Ville
                    </th>
                    
                </tr>
            </thead>

            <tbody>
            <?php $res = $query->fetchAll();
            foreach ($res as $row) { ?>
                <?php

                    $id = $row['idUtilisateur'];
                    $Nom = $row['nom'];
                    $Prenom = $row['prenom'];
                    $Email = $row['email'];
                    $Adresse = $row['adresse_postale'];
                    $Ville = $row['ville'];

                
                ?><tr>
                    <td><?= $id; ?></td>
                    <td><?= $Nom; ?></td>
                    <td><?= $Prenom; ?></td>
                    <td><?= $Email; ?></td>
                    <td><?= $Adresse; ?></td>
                    <td><?= $Ville; ?></td>
                    <td><a class="w-100 btn btn-lg btn-primary" href="index.php?Modules=ADMIN&action=retirerUtilisateur&id=<?=$id;?>">Supprimer</a></td>

                </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    <?php 
    }else{
         echo "<h6 class='text-danger text center mt-3'> Pas de resultat </h6>";
     }

 }
    //$recup = $query->fetchAll();


    /* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/

?>