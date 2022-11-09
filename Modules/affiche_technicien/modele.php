<?php
require_once('Login.php');
class modele_techniciens extends ConnexionUI
{

    public function getlistTechnicien()
    {
        $str = $_POST["recherche"];
        $sth = self::$bdd->query("SELECT * FROM `techniciens` INNER JOIN `Categories` ON  `Categories.idCat` = `techniciens.idCategorie` WHERE `nomCat` like '%$str%'");

        return $sth;
    }

    public function getCategories()
    {
        $sth = self::$bdd->query("SELECT * FROM `Categories`");
        return $sth;
    }
    public function detailsCat()
    {
        $id = $_GET["idCat"];
        try {
            foreach (self::$bdd->query("SELECT * from Categories where id=$id ") as $row) {
                print_r($row);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
