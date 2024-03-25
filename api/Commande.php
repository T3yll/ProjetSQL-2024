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

        if ($newRestaurant==null || $newRestaurant == "" ){
            $_SESSION["ErrorRestaurant"] = "Veuillez choisir un restaurant";
            header("Location: ../CommandePage.php");
            die();
        }
        if (count($existingPlats) == 0) {
            $_SESSION["ErrorPlat"] = "Veuillez choisir un ou pluisieurs plats";
            header("Location: ../CommandePage.php");
            die();
        }



        foreach ($existingPlats as $plat) {
            if (!in_array($plat, $Listplat)) {
                //header("Location: ../CommandePage.php");
                //die();
            }
        }
            $restaurants = array("Le Petit Bistro",
            "La Brasserie",
            "Chez Jean",
            "Le Jardin Gourmand",
            "La Table Provençale",
            "Le Bistrot du Coin",
            "La Crêperie Bretonne",
            "Le Restaurant Gastronomique",
            "La Pizzeria",
            "Le Café Parisien");
    
            foreach ($restaurants as $restaurant) {
            if (!in_array($newRestaurant, $restaurants)) {
                //header("Location: ../CommandePage.php");
                //die();
            }
        }

        if (!is_numeric($AdresseNum) === true) {
            $_SESSION["ErrorNumero"] = "Le numero de rue doit être un nombre";
            header("Location: ../CommandePage.php");
            die();
        }
        if (!is_numeric($AdresseCP) === true) {
            $_SESSION["ErrorCode"] = "Le code postal doit être un nombre";
            header("Location: ../CommandePage.php");
            die();
        }

        $db = new DB();

        $Lastcommande = $db->AddCommande($existingPlats, $newRestaurant, $_POST['commentaire'],$AdresseComplete,$client);
        if (!isset ($_SESSION["Commandes"])) {
            $_SESSION["Commandes"] = array();
        }
        $Lastcommande["Adresse"] = $AdresseComplete;
        array_push($_SESSION["Commandes"], $Lastcommande);
        if (isset($Lastcommande["Probleme"])) {
            $_SESSION["Probleme"] = $Lastcommande["Probleme"];
            header("Location: ../commandePage.php");
           die();
        }
        header("Location: ../VosCommandes.php");
        die();
        
    }