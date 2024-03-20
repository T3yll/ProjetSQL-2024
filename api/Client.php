<?php
require_once("../class/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $newNom = $_POST['Nom'];
        $newPrenom = $_POST['Prenom'];

        $AdresseNum = $_POST['numero_rue'];
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