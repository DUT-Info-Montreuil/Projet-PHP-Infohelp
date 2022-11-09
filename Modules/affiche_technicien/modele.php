<?php
require_once('Login.php');
class modele_techniciens extends ConnexionUI
{

    public function getlistTechnicien()
    {
        //$str = $_POST["recherche"];
        //$idCat = $_POST["idCat"] where techniciens.idCategorie ='$idCat';
        $cat = $_POST["categorie"];
        $sth1 = self::$bdd->prepare("SELECT * FROM `techniciens` inner join `Categories` on techniciens.idCategorie = Categories.idCat where idCat = '$cat'");
        $sth1->execute();
        $recuptech = $sth1->fetchAll();
        return $recuptech;
    }

    public function getCategories()
    {
        $sth = self::$bdd->query("SELECT * FROM `Categories`");
        return $sth;
    }
    /* public function detailsCat()
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
    } */
}
