<?php
    require_once("./Modules/Login.php");
    ConnexionUI::initConnexion();
    //echo "hello";
    if (isset($_POST['nom'])) {
     $input = $_POST['nom'];
     $query =  ConnexionUI::getBDD()->prepare("SELECT * FROM `utilisateurs` WHERE `last_name` LIKE '%{$input}%' and `mode`=0 or `first_name` LIKE '%{$input}%'and `mode`=0 ");
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

                    $id = $row['userID'];
                    $Nom = $row['last_name'];
                    $Prenom = $row['first_name'];
                    $Email = $row['email'];
                    $Adresse = $row['postal_address'];
                    $Ville = $row['city'];

                
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
         echo "<h6 class='text-danger text center mt-3'> No data found</h6>";
     }

 }
    //$recup = $query->fetchAll();


?>