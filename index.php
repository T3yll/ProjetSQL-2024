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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>


<html>

<body>
  <?php echo file_get_contents("components/Nav.html"); ?>

  <main>
    <div aria-hidden="true" id="carouselExampleSlidesOnly" class="carousel slide m-2" data-bs-ride="carousel">
      <div aria-hidden="true" class="carousel-inner">
        <div class="carousel-item active">
          <img aria-hidden="true" src="public/ADS1.png" alt="carrousel1" class="d-block w-100 carousel-img">
          <div class="carousel-caption d-none d-md-block">
          <h1>Chaine de restaurants Restôt</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img aria-hidden="true" src="public/ADS2.png" alt="carrousel2" class="d-block w-100 carousel-img">
          <div class="carousel-caption d-none d-md-block">
          <h1>Chaine de restaurants Restôt</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img aria-hidden="true" src="public/ADS3.jpg" alt="carrousel3" class="d-block w-100 carousel-img">
          <div class="carousel-caption d-none d-md-block">
            <h1>Chaine de restaurants Restôt</h1>
          </div>
        </div>
      </div>
    </div>
  </main>
  <main class="p-5">

    <div class="row row-cols-3 g-3">
      <div class="col">
        <div class="card">
          <img src="public/commande.jpeg" class="card-img-top" alt="Hollywood Sign on The Hill" />
          <div class="card-body">
            <h5 class="card-title">Commander</h5>
            <p class="card-text">
              Commander dans le restaurant de la chaine restot le plus proche de chez vous et faites vous livrer à
              domicile !
            </p>
            <a href="Commande" class="btn btn-primary stretched-link">Commander</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="public/restaurant.jpg" class="card-img-top" alt="Palm Springs Road" />
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
          <img src="public/Francky Burger Bien Gaulé.jpg" class="card-img-top" alt="Palm Springs Road" />
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>