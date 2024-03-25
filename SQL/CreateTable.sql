-- table Adresse
CREATE TABLE IF NOT EXISTS Adresse (
            AdresseId INT PRIMARY KEY AUTO_INCREMENT,
            Numero INT NOT NULL,
            Rue VARCHAR(255) NOT NULL,
            Ville VARCHAR(255) NOT NULL,
            CodePostal INT NOT NULL,
            Pays VARCHAR(255) NOT NULL);

-- table Restaurant
CREATE TABLE IF NOT EXISTS  Restaurant (
            RestaurantId INT PRIMARY KEY AUTO_INCREMENT,
            Nom VARCHAR(255) NOT NULL,
            Ville VARCHAR(255) NOT NULL,
            AdresseId INT NOT NULL,
            FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId)
        );

-- table Client
CREATE TABLE IF NOT EXISTS  Client (
            ClientId INT PRIMARY KEY AUTO_INCREMENT,
            Nom VARCHAR(255) NOT NULL,
            Prenom VARCHAR(255) NOT NULL
          );

-- table Commande
CREATE TABLE IF NOT EXISTS  Commande (
            CommandeId INT PRIMARY KEY AUTO_INCREMENT,
            ClientId INT NOT NULL,
            RestaurantId INT NOT NULL,
            Date DATETIME NOT NULL,
            Prix DECIMAL(10,2) NOT NULL,
            Commentaire TEXT,
            FOREIGN KEY (clientId) REFERENCES Client(ClientId),
            FOREIGN KEY (RestaurantId) REFERENCES Restaurant(RestaurantId)
        )

-- table Livreur
CREATE TABLE IF NOT EXISTS  Livraison (
            LivraisonId INT PRIMARY KEY AUTO_INCREMENT,
            CommandeId INT NOT NULL,
            AdresseId INT NOT NULL,
            Effectue BOOLEAN NOT NULL,
            ProblemeId INT,
            FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId),
            FOREIGN KEY (ProblemeId) REFERENCES Probleme(ProblemeId)
        );

-- table Plat
CREATE TABLE IF NOT EXISTS  Plat (
            PlatId INT PRIMARY KEY AUTO_INCREMENT,
            Nom VARCHAR(255) NOT NULL,
            Description TEXT,
            Prix DECIMAL(10,2) NOT NULL
          );

-- table de liaison Ligne_commande
CREATE TABLE IF NOT EXISTS  LienCommandePlat (
            CommandeId INT NOT NULL,
            PlatId INT NOT NULL,
            Quantite INT NOT NULL,
            PRIMARY KEY (CommandeId, PlatId),
            FOREIGN KEY (CommandeId) REFERENCES Commande(CommandeId),
            FOREIGN KEY (PlatId) REFERENCES Plat(PlatId)
);

-- table Problème
CREATE TABLE IF NOT EXISTS  Probleme (
            ProblemeId INT PRIMARY KEY AUTO_INCREMENT,
            Message TEXT
        );