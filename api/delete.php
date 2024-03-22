<?php
require_once ("../class/db.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['id'];
    $db = new Db();
    $db->DeleteCommande($_SESSION["Commandes"][$index]["CommandeId"]);
    unset($_SESSION["Commandes"][$index]);
    header("Location: ../VosCommandes");
    die();
}
