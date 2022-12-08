<?php
    require_once("./Modules/Login.php");
    ConnexionUI::initConnexion();
    //echo "hello";
    var_dump($_POST['nom']);
    if (isset($_POST['nom'])) {
        echo "isset nom";
     $input = $_POST['nom'];
     $query =  ConnexionUI::getBDD()->prepare("SELECT * FROM `techniciens` where nom LIKE '{$input}%' ");
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
                        favoris
                    </th>
                    <th>
                        rayon d'activité
                    </th>
                    <th>
                        idCategorie
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $query->fetchAll();
                foreach ($row as $res) {
                    $id = $row['idTechnicien'];
                    $Nom = $row['nom'];
                    $Prenom = $row['prenom'];
                    $idVille = $row['idVille'];
                    $note = $row['note'];
                    $favoris = $row['favoris'];
                    $rayonDactivite = $row['rayonDactivite'];
                    $idCategorie = $row['idCategorie'];
                
                ?><tr>
                    <td><?= $id; ?></td>
                    <td><?= $Nom; ?></td>
                    <td><?= $Prenom; ?></td>
                    <td><?= $idVille; ?></td>
                    <td><?= $note; ?></td>
                    <td><?= $favoris; ?></td>
                    <td><?= $rayonDactivite; ?></td>
                    <td><?= $idCategorie; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
                
        </table>
    <?php 
    }else{
         echo "<h6 class='text-danger text center mt-3'> No data found</h6>";
     }
 }
 else{
    echo "BADMAN";
 }
    //$recup = $query->fetchAll();


?>