<form method="POST" action="/api/Client.php">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>
    
    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required>
    
    <input type="submit" value="Envoyer">
</form>
<h2>Commande</h2>


<form action="/api/Commande.php" method="POST">
    <label for="date">Date :</label>
    <input type="date" name="date" id="date" required><br>

    <label for="prix">Prix :</label>
    <input type="number" name="prix" id="prix" required><br>

    <label for="commentaire">Commentaire :</label>
    <textarea name="commentaire" id="commentaire"></textarea><br>

    <input type="submit" value="Valider">
</form>




<h2>Livraison</h2>
<form action="/api/Adresse.php" method="POST">
<label for="numero_rue">Numéro de rue :</label>
    <input type="text" name="numero_rue" id="numero_rue" required><br>

    <label for="ville">Ville :</label>
    <input type="text" name="ville" id="ville" required><br>

    <label for="code_postal">Code postal :</label>
    <input type="text" name="code_postal" id="code_postal" required><br>

    <label for="pays">Pays :</label>
    <input type="text" name="pays" id="pays" required><br>
</form>



<h2>Plat</h2>
<form action="/api/EnregistrerChoix.php" method="POST">
    <label for="image1">
        <img src="chemin/vers/image1.jpg" alt="Image 1">
        <input type="radio" name="choix" id="image1" value="image1">
    </label>

    <label for="image2">
        <img src="chemin/vers/image2.jpg" alt="Image 2">
        <input type="radio" name="choix" id="image2" value="image2">
    </label>

    <label for="image3">
        <img src="chemin/vers/image3.jpg" alt="Image 3">
        <input type="radio" name="choix" id="image3" value="image3">
    </label>

    <input type="submit" value="Enregistrer">
</form>