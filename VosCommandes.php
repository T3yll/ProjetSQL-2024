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
<?php echo file_get_contents("components/Nav.html");?>
<?php if ( !isset($commandes) || count($commandes)==0):?>
    <main class="p-5">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="card no-command">
                <h1>Vous n'avez pas de commandes pour le moment</h1>
            </div>
        </div>
    </main>
<?php else:?>
    <main class="p-5 container-fluid content-row">
        <div class="row">
            <?php $i=0; foreach ($commandes as $commande): ?>
                <div class="col-lg-4 my-2">
                    <div class="card h-100 flex-fill">
                        <h5><?php echo $commande["Prix"] ?> €</h5>
                        <div class="container-fluid content-row ">
                        <form class="flex-row" action="api/update.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $i ?>">
                            <label for="">Commentaire</label>
                            <input type="text" name="commentaire" value="<?php echo $commande["Commentaire"] ?>">
                            <label for="">Numero</label>
                            <input type="text" name="numero" value="<?php echo $commande["Adresse"][0] ?>">
                            <label for="">Rue</label>
                            <input type="text" name="rue" value="<?php echo $commande["Adresse"][1] ?>">
                            <label for="">Ville</label>
                            <input type="text" name="ville" value="<?php echo $commande["Adresse"][2] ?>">
                            <label for="">Code Postal</label>
                            <input type="text" name="codePostal" value="<?php echo $commande["Adresse"][3] ?>">
                            <label for="">Pays</label>
                            <input type="text" name="pays" value="<?php echo $commande["Adresse"][4] ?>">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                        <form action="api/delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $i ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </main>
<?php endif;?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>