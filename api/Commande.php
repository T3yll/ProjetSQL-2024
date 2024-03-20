<?php
require_once("../class/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newRestaurant = $_POST['restaurant'];
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

        $restaurants = array("Resto1", "Resto2", "Resto3");

        if (in_array($newRestaurant, $restaurants)) {
            //bien monchef
        } else {
            echo "Restaurant is not in the list";
        }

        
        echo $newRestaurant;
        echo $newPlat;
        $db = new DB();
        $Lastcommande=$db->AddCommande($existingPlats,$newRestaurant,$_POST['commentaire'],$_POST['adresse'],$_POST['client']);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        session_start();
        header("Location: ../VosCommandes.php");
        if (!isset($_SESSION["Commandes"])) {
            $_SESSION["Commandes"] = array();
        }
        array_push($_SESSION["Commandes"],$Lastcommande);


    }
