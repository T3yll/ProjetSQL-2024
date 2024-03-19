<?php
require_once("../class/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $newNom = $_POST['restaurant'];
        $newPrenom = $_POST['restaurant'];

        $AdresseNum = $_POST['Numero'];
        $AdresseRue = $_POST['Rue'];
        $AdresseVille = $_POST['Ville'];
        $AdresseCP = $_POST['code postale'];
        $AdressePays = $_POST['Pays'];


        echo $newRestaurant;
        echo $newPlat;



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>