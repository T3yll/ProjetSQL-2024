<?php
require_once("../class/db.php");


session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newRestaurant = $_POST['restaurant'];

        $newNom = $_POST['Nom'];
        $newPrenom = $_POST['Prenom'];

        $AdresseNum = $_POST['numero'];
        $AdresseRue = $_POST['rue'];
        $AdresseVille = $_POST['Ville'];
        $AdresseCP = $_POST['codepostal'];
        $AdressePays = $_POST['Pays'];

        $AdresseComplete = array();
        $client = array();
        array_push($AdresseComplete, $AdresseNum, $AdresseRue, $AdresseVille, $AdresseCP, $AdressePays);
        array_push($client, $newNom, $newPrenom);


        $existingPlats = array_filter($_POST, function($key) {
            return strpos($key, 'plat') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $Listplat = array("Francky Burger Bien Gaulé", "Francky Carbo Bien Mouillé", "Francky Steak Trique", "Francky Lasagne à 4 pattes", "Francky Pizza Dans Ton Ananas", "Francky Merveilleux Tout Chaud", "Francky Je Sens Tes Profiteroles", "Francky Donne Moi Ton Ravioli", "Francky Saint-Hono-Raie");

        foreach ($existingPlats as $plat) {
            if (!in_array($plat, $Listplat)) {
                //header("Location: ../VosCommandes.php");
                //die();
            }
        }
    
            $restaurants = array("Resto1", "Resto2", "Resto3");
    
            foreach ($restaurants as $restaurant) {
            if (!in_array($newRestaurant, $restaurants)) {
                //header("Location: ../VosCommandes.php");
                //die();
            }
        }

        $db = new DB();

        $Lastcommande = $db->AddCommande($existingPlats, $newRestaurant, $_POST['commentaire'],$AdresseComplete,$client);
        print_r($Lastcommande);
        if (!isset ($_SESSION["Commandes"])) {
            $_SESSION["Commandes"] = array();
        }
        $Lastcommande["Adresse"] = $AdresseComplete;
        array_push($_SESSION["Commandes"], $Lastcommande);
        //header("Location: ../VosCommandes.php");
        //die();
    }
