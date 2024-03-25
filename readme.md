# Gestionnaire de commandes restôt

Ce projet consiste en un gestionnaire de commande en php et sql.



## Configuration

Pour la base de données, les données de connexions se trouvent dans class/db.php, en haut du fichier.

Il faut ensuite créer une base de données (nommée sqlProj, ou autrement en changeant le nom dans la classe DB).

Pour creer et remplir les tables, il faut decommenter les lignes 18 et 19 dans class/db.php, se rendre sur localhost/, et recommenter les lignes pour eviter que les tables se remplissent à nouveau.

L'ensemble des requetes se trouvent dans la classe DB, et les requetes non preparées se trouvent également dans le dossier SQL.


## Features

- Créer des commandes: plats, restarant, adresse, et information de client.

- Se faire livrer : Possibilité de probleme aboutissant à l'échec de la livraison.

- voir les commandes créées

- Supprimer des commandes.
 
- Mettre à jour des commandes.
 
- Voir les differents plats.

- Voir les differents Restaurants.

Le tout depuis une interface web.









## Contributeurs

- [Suckiel Theo]

- [Leroi Remi]

- [Bertaud Nathan]

