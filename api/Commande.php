<?php
require_once("../class/db.php");

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
            if (in_array($plat, $Listplat)) {
                echo $plat;
            } else {
                echo "Plat is not in the list";
            }
        }
        
        foreach ($restaurants as $restaurant) {
            $restaurants = array();
            array_push($restaurants, $restaurant["Nom"]);
            
            if ($restaurant["Nom"] == $newRestaurant) {
                $newRestaurant = $restaurant["Nom"];
            } else {
                echo "Restaurant is not in the list";
            }
        }

        $db = new DB();

        $db->AddCommande($existingPlats,$newRestaurant,$_POST['commentaire'],$AdresseComplete,$client);



    }
