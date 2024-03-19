<?php
require_once("../class/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $newRestaurant = $_POST['restaurant'];
        $existingPlats = $_POST['existingPlats'];

        foreach ($existingPlats as $plat) {
            echo $plat;
        }

        $restaurants = array("Resto1", "Resto2", "Resto3");

        if (in_array($newRestaurant, $restaurants)) {
            //bien monchef
        } else {
            echo "Restaurant is not in the list";
        }

        $plat = array("Francky Burger Bien Gaulé", "Francky Carbo Bien Mouillé", "Francky Steak Trique", "Francky Lasagne à 4 pattes", "Francky Pizza Dans Ton Ananas", "Francky Merveilleux Tout Chaud", "Francky Je Sens Tes Profiteroles", "Francky Donne Moi Ton Ravioli", "Francky Saint-Hono-Raie");

        if (in_array($newPlat, $plat)) {
            //bien monchef
        } else {
            echo "Plat is not in the list";
        }
        echo $newRestaurant;
        echo $newPlat;



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>


<script>
  document.getElementById('ajouterPlat').addEventListener('click', function() {
    var clone = document.querySelector('.plat').cloneNode(true);
    document.getElementById('plats').appendChild(document.createElement('div')).classList.add('mb-3', 'plat');
    document.querySelector('.plat:last-child').appendChild(clone);
  });
</script>
