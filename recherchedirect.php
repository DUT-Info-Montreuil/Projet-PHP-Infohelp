
<?php
require_once('Connexion.php');
    ConnexionUI::initConnexion();
    if (isset($_POST['nom'])) {
     $input = $_POST['nom'];
     $query =  ConnexionUI::getBDD()->prepare("SELECT * FROM `techniciens` where nom LIKE '%{$input}%' or prenom LIKE '%{$input}%'");
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
                        idVille
                    </th>
                    <th>
                        note
                    </th>
                    <th>
                        idCategorie
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $query->fetchAll();
                foreach ($res as $row) {
                    $id = $row['idTechnicien'];
                    $Nom = $row['nom'];
                    $Prenom = $row['prenom'];
                    $idVille = $row['idVille'];
                    $note = $row['note'];
                    $idCategorie = $row['idCategorie'];
                
                ?><tr>
                    <td><?= $id; ?></td>
                    <td><?= $Nom; ?></td>
                    <td><?= $Prenom; ?></td>
                    <td><?= $idVille; ?></td>
                    <td><?= $note; ?></td>
                    <td><?= $idCategorie; ?></td>
                    <td><a class="btn btn-outline-light" href="index.php?Modules=ADMIN&action=retirerTechnicien&id=<?=$id;?>">Supprimer</a></td>

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



 /* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/
?>