
<!DOCTYPE html>
<html lang="fr">
<?php
require_once("class/Db.php");
$DB=new Db();
?>
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

</head>


<html>
<body>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <p class="navbar-brand h1">Restôt</p>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <p class="offcanvas-title h1" id="offcanvasDarkNavbarLabel">Restôt</p>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="commandePage.php">Commandes</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="plats" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Plats
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="restaurants" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<div aria-hidden="true" id="carouselExampleSlidesOnly" class="carousel slide m-2" data-bs-ride="carousel">
            <div aria-hidden="true" class="carousel-inner">
              <div class="carousel-item active">
                <img aria-hidden="true" src="public/carbonara.png" alt="carrousel1" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img aria-hidden="true" src="public/pizza.jpg" alt="carrousel2" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img aria-hidden="true" src="public/lasagne.jpg" alt="carrousel3" class="d-block w-100">
              </div>
            </div>
</div>
</main>
<main class="p-5">

<div class="row row-cols-3 g-3">
  <div class="col">
    <div class="card">
      <img src="public/commande.jpeg" class="card-img-top"
        alt="Hollywood Sign on The Hill" />
      <div class="card-body">
        <h5 class="card-title">Commander</h5>
        <p class="card-text">
          Commander dans le restaurant de la chaine restot le plus proche de chez vous et faites vous livrer à domicile !
        </p>
        <a href="Commande" class="btn btn-primary stretched-link">Commander</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="public/restaurant.jpg" class="card-img-top"
        alt="Palm Springs Road" />
      <div class="card-body">
        <h5 class="card-title">Nos restaurants</h5>
        <p class="card-text">
          Acceder a nos restaurants et leurs localisations !
        </p>
        <a href="restaurants" class="btn btn-primary stretched-link">Voir les restaurants</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="public/burger.jpg" class="card-img-top"
        alt="Palm Springs Road" />
      <div class="card-body">
        <h5 class="card-title">Nos plats</h5>
        <p class="card-text">
          Voir la liste des plats disponibles dans nos restaurants !
        </p>
        <a href="plats" class="btn btn-primary stretched-link">Voir les plats</a>
      </div>
    </div>
  </div>
  
  
 
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>

</html>