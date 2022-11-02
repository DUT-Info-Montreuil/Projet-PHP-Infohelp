<?php 
require_once("vuegenerique.php");

class vue_techniciens extends vueGenerique{

public function __construct()
    {
    }
    public function barre_de_recherche($resultquery){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="index.php?Modules=affiche_technicien&action=list" method="post">
            <label> rechercher </label>
            <input type="text" name="recherche" placeholder="Valeur rechercher">
            <input type="submit" value="sub">
            </form>
            <table>
                <tr>
                    <th>
                        Id
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
                        avis
                    </th>
                    <th>
                        favoris
                    </th>
                    <th>
                        rayon d'activité
                    </th>
                </tr>
                <?php while($row = mysql_fetch_array($resultquery)): ?>
                <tr>
                    <td><?php echo $row['idTechnicien']?></td>
                    <td><?php echo $row['nom']?></td>
                    <td><?php echo $row['prenom']?></td>
                    <td><?php echo $row['idVille']?></td>
                    <td><?php echo $row['avis']?></td>
                    <td><?php echo $row['favoris']?></td>
                    <td><?php echo $row['rayon d\'activité']?></td>

                </tr>
                <?php endwhile;?>
            </table>
        </body>
        </html>
        <?php
    }
}

?>