<?php
session_start();
$commandes=$_SESSION["Commandes"];

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
<?php echo file_get_contents("components/Nav.html"); 
print_r($_SESSION);?>
    <main class="p-5 container-fluid content-row">
        <div class="row">
            <?php foreach ($commandes as $commande): ?>
                <div class="col-lg-4 my-2">
                    <div class="card h-100 flex-fill">
                        <h5><?php echo $commande["Prix"] ?> €</h5>
                        <form action="api/deleteCommande" method="post">
                            <input type="hidden" name="id" value="<?php echo $commande["CommandeId"] ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <form action="api/updateCommande" method="post">
                            <input type="hidden" name="id" value="<?php echo $commande["CommandeId"] ?>">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
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