<?php
require_once("../class/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $newRestaurant = $_POST['restaurant'];
        $newPlat = $_POST['plat'];


        echo $newRestaurant;
        echo $newPlat;



    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>