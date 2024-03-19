<?php
require_once("../class/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
       // $newNom = $_POST['restaurant'];
        //$newPrenom = $_POST['restaurant'];

        $AdresseNum = $_POST['numero_rue'];
        //$AdresseRue = $_POST['Rue'];
        $AdresseVille = $_POST['Ville'];
        $AdresseCP = $_POST['codepostal'];
        $AdressePays = $_POST['Pays'];


        echo $AdresseNum;
        echo $AdresseVille;
        echo $AdresseCP;
        echo $AdressePays;



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>