<?php 
require_once("class/db.php");
$db = new DB();
$restaurants = $db->GetRestaurants();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="scripts/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
        main {
            background-image: url('public/commandePageBurger.png'); /* Chemin vers votre image */
            background-size: cover; /* Ajuste la taille de l'image pour remplir l'arrière-plan */
            background-position: center; /* Centre l'image dans l'arrière-plan */
            background-repeat: no-repeat; /* Empêche la répétition de l'image */
        }
</style>
<style>
    .navbar-brand-logo {
        width: 80px; /* Définissez la largeur souhaitée */
        height: auto; /* Laissez la hauteur automatique pour maintenir les proportions */
    }
</style>
</head>


<html>
<body>
<?php echo file_get_contents("components/Nav.html"); ?>


<main>
  <div class="container mt-5 text-center mb-5">
    <div class="text-center mt-5">
      <div class="text-center mb-5">
        <h1 class="text-black fw-bold">Chope ta Francky commande ici !</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="mb-5">
        <?php session_start(); if (isset($_SESSION["Probleme"])): ?>
            <h2 class="text-danger">Une erreur est survenue lors de la livraison de votre commande :</h2>
            <p><?php echo $_SESSION["Probleme"]; ?></p>
            <?php unset($_SESSION["Probleme"]); endif; ?>
        
        <form id="commandeForm" action="/api/Commande.php?action=add" method="post">
    <div class="mb-3">
    <?php session_start(); if (isset($_SESSION["ErrorRestaurant"])): ?>
            <h2 class="text-danger"><?php echo $_SESSION["ErrorRestaurant"]; ?></h2>
            <?php unset($_SESSION["ErrorRestaurant"]); endif; ?>
        <label for="restaurant" class="form-label">Choisis ton francky restaurant :</label>
        <select class="form-select" id="restaurant" name="restaurant" aria-label="Choisir un restaurant" required>
            <option selected disabled>Choisir un restaurant</option>
            <?php foreach ($restaurants as $restaurant) { ?>
                <option value="<?php echo $restaurant["Nom"]; ?>"><?php echo $restaurant["Nom"]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div id="plats">
        <label for="plat" class="form-label mt-3">Choisis tes francky plats :</label>
        <?php session_start(); if (isset($_SESSION["ErrorPlat"])): ?>
            <h2 class="text-danger"><?php echo $_SESSION["ErrorPlat"]; ?></h2>
            <?php unset($_SESSION["ErrorPlat"]); endif; ?>
        <div class="mb-3 plat mt-3">
            <select class="form-select" id="plat" name="plat1" aria-label="Choisir un plat" required>
                <option selected disabled>Choisir un plat</option>
                <option>Francky Burger Bien Gaulé</option>
                <option>Francky Carbo Bien Mouillé</option>
                <option>Francky Steak Trique</option>
                <option>Francky Lasagne à 4 pattes</option>
                <option>Francky Pizza Dans Ton Ananas</option>
                <option>Francky Merveilleux Tout Chaud</option>
                <option>Francky Je Sens Tes Profiteroles</option>
                <option>Francky Donne Moi Ton Ravioli</option>
                <option>Francky Saint-Hono-Raie</option>
            </select>
        </div> 
      </div>
      <div class="mb-3">
          <label for="numero_rue" class="form-label">Commentaire :</label>
          <input type="text" class="form-control" id="numero_rue" name="commentaire"required>
      </div>
      
      <button type="button" id="ajouterPlat" class="btn btn-success mt-3">Ajouter un plat</button>

      
          <div class="mb-3">
          <?php session_start(); if (isset($_SESSION["ErrorNumero"])): ?>
            <h2 class="text-danger"><?php echo $_SESSION["ErrorNumero"]; ?></h2>
            <?php unset($_SESSION["ErrorNumero"]); endif; ?>
              <label for="numero" class="form-label">Numero :</label>
              <input type="text" class="form-control" id="numero" name="numero" required>
          </div>
          <div class="mb-3">
              <label for="rue" class="form-label">Rue:</label>
              <input type="text" class="form-control" id="rue" name="rue" required>
          </div>
          <div class="mb-3">
              <label for="ville" class="form-label">Ville :</label>
              <input type="text" class="form-control" id="ville" name="Ville" required>
          </div>
          <div class="mb-3">
          <?php session_start(); if (isset($_SESSION["ErrorCode"])): ?>
            <h2 class="text-danger"><?php echo $_SESSION["ErrorCode"]; ?></h2>
            <?php unset($_SESSION["ErrorCode"]); endif; ?>
              <label for="codePostal" class="form-label">Code Postal :</label>
              <input type="text" class="form-control" id="codePostal" name="codepostal" required>
          </div>
          <div class="mb-3">
              <label for="pays" class="form-label">Pays :</label>
              <input type="text" class="form-control" id="pays" name="Pays" required>
          </div>
          <div class="mb-3">
              <label for="pays" class="form-label">Nom :</label>
              <input type="text" class="form-control" id="pays" name="Nom" required>
          </div>
          <div class="mb-3">
              <label for="pays" class="form-label">Prenom :</label>
              <input type="text" class="form-control" id="pays" name="Prenom" required>
          </div>
          <button type="submit" class="btn btn-primary" onClick="return empty()">Valider</button>
      </form>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
<script>
  var platCount = 2;
  document.getElementById('ajouterPlat').addEventListener('click', function() {
    var clone = document.querySelector('.plat').cloneNode(true);
    clone.querySelector('select').setAttribute('name', 'plat' + platCount);
    document.getElementById('plats').appendChild(document.createElement('div')).classList.add('mb-3', 'plat');
    document.querySelector('.plat:last-child').appendChild(clone);
    platCount++;
  });
</script>
</body>

</html>