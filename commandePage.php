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
        body {
            background-image: url('public/commandePageBurger.webp'); /* Chemin vers votre image */
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
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <img src="public/restologo.png" alt="Logo" class="navbar-brand-logo me-2">
      <a class="navbar-brand" href="#">Restôt</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Restôt</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Commandes</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Plats
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Nos magasins
            </a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>


<main>
  <div class="container mt-5 text-center mb-5">
    <div class="text-center mt-5">
      <div class="col-md-6 text-center start-50 mb-5">
        <h1 class="text-black fw-bold">Chope ta Francky commande ici !</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="mb-5">
          <form id="commandeForm" action="/api/Commande.php?action=add" method="post">
            <div class="mb-3">
              <label for="restaurant" class="form-label">Choisis ton francky restaurant :</label>
              <select class="form-select" id="restaurant" name="restaurant" aria-label="Choisir un restaurant">
                <option selected disabled>Choisir un restaurant</option>
                <option value="Resto1">Resto1</option>
                <option value="Resto2">Resto2</option>
                <option value="Resto3">Resto3</option>
              </select>
            </div>
            <div id="plats">
              <label for="plat" class="form-label mt-3">Choisis tes francky plats :</label>
              <div class="mb-3 plat mt-3">
                <select class="form-select" id="plat" name="plat" aria-label="Choisir un plat">
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
            <button type="submit" class="btn btn-primary">Valider</button>
          </form>
          <button id="ajouterPlat" class="btn btn-success mt-3">Ajouter un plat</button>
        </div>
      </div>
    </div>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
<script>
  document.getElementById('ajouterPlat').addEventListener('click', function() {
    var clone = document.querySelector('.plat').cloneNode(true);
    document.getElementById('plats').appendChild(document.createElement('div')).classList.add('mb-3', 'plat');
    document.querySelector('.plat:last-child').appendChild(clone);
  });
</script>
</body>

</html>