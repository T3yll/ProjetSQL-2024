

<?php

require_once("../class/db.php");


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AdresseNum = $_POST['numero'];
    $AdresseRue = $_POST['rue'];
    $AdresseVille = $_POST['ville'];
    $AdresseCodePostal = $_POST['codePostal'];
    $AdressePays = $_POST['pays'];
    $AdresseComplete = array();
    $client = array();
    $index = $_SESSION["Commandes"][$_POST['id']]["CommandeId"];
    echo $index;
    echo $_POST['commentaire'];
    array_push($AdresseComplete, $AdresseNum, $AdresseRue, $AdresseVille, $AdresseCodePostal, $AdressePays);
    $db= new DB();
    echo $db->UpdateCommande($index, $_POST['commentaire'],$AdresseComplete);

}