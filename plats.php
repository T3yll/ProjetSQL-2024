<?php
require_once 'class/db.php';
$db = new DB();
$plats = $db->getPlats();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/plats.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="scripts/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <p class="navbar-brand h1">Restôt</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <p class="offcanvas-title h1" id="offcanvasDarkNavbarLabel">Restôt</p>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="Commande">Commandes</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="plats" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Plats
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="restaurants" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
    <main class="p-5">
        <div class="row row-cols-3 g-3">
            
                <?php foreach ($plats as $plat): ?>
<div class="col">
                    <div class="card">
                        <img src="public/<?php echo strtolower($plat["Nom"] . ".jpg") ?>" class="card-img-top plat-img"
                            alt="Hollywood Sign on The Hill" />
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $plat["Nom"] ?>
                            </h5>
                            <p class="card-text">
                                Ingredients:
                                <?php echo $plat["Description"] ?>
                            </p>
                        </div>
                    </div>
</div>
                <?php endforeach; ?>
            
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>