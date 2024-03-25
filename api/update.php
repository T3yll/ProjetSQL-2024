

<?php

require_once("../class/db.php");


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['id'];
    $AdresseNum = $_POST['numero'];
    $AdresseRue = $_POST['rue'];
    $AdresseVille = $_POST['ville'];
    $AdresseCodePostal = $_POST['codePostal'];
    $AdressePays = $_POST['pays'];
    $AdresseComplete = array();
    $client = array();
    $index = $_SESSION["Commandes"][$index]["CommandeId"];
    array_push($AdresseComplete, $AdresseNum, $AdresseRue, $AdresseVille, $AdresseCodePostal, $AdressePays);

    if (!is_numeric($AdresseNum) === true) {
        $_SESSION["ErrorNumero"] = "Le numero de rue doit être un nombre";
        header("Location: ../VosCommandes");
        die();
    }
    if (!is_numeric($AdresseCodePostal) === true) {
        $_SESSION["ErrorCode"] = "Le code postal doit être un nombre";
        header("Location: ../VosCommandes");
        die();
    }


    $db= new DB();
    $updated=$db->UpdateCommande($index, $_POST['commentaire'],$AdresseComplete);
    $updated["Adresse"] = $AdresseComplete;
    $_SESSION["Commandes"][$_POST["ArrayId"]]=$updated;
    header("Location: ../VosCommandes");
    die();
}