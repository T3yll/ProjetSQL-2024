-- table Adresse
CREATE TABLE Adresse (
  AdresseId INT PRIMARY KEY,
  Numero INT NOT NULL,
  Rue VARCHAR(255) NOT NULL,
  Ville VARCHAR(255) NOT NULL,
  CodePostal INT NOT NULL,
  Pays VARCHAR(255) NOT NULL,
);

-- table Restaurant
CREATE TABLE Restaurant (
    RestaurantId INT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Ville VARCHAR(255) NOT NULL,
    AdresseId INT NOT NULL,
    FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId),
);

-- table Client
CREATE TABLE Client (
  ClientId INT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Prenom VARCHAR(255) NOT NULL,
);

-- table Commande
CREATE TABLE Commande (
    CommandeId INT PRIMARY KEY,
    ClientId INT NOT NULL,
    RestaurantId INT NOT NULL,
    Date DATETIME NOT NULL,
    Prix INT NOT NULL,
    LivraisonId INT NOT NULL,
    Commentaire TEXT,
    FOREIGN KEY (clientId) REFERENCES Client(ClientId),
    FOREIGN KEY (LivraisonId) REFERENCES Livraison(LivraisonId),
    FOREIGN KEY (RestaurantId) REFERENCES Restaurant(RestaurantId),
);

-- table Livreur
CREATE TABLE Livraison (
    LivraisonId INT PRIMARY KEY,
    CommandeId INT NOT NULL,
    AdresseId INT NOT NULL,
    Effectue BOOLEAN NOT NULL,
    ProblemeId INT,
    FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId),
    FOREIGN KEY (ProblemeId) REFERENCES Probleme(ProblemeId)
);

-- table Plat
CREATE TABLE Plat (
  PlatId INT PRIMARY KEY,
  Nom VARCHAR(255) NOT NULL,
  Description TEXT,
  Prix DECIMAL(10,2) NOT NULL
);

-- table de liaison Ligne_commande
CREATE TABLE LienCommandePlat (
  CommandeId INT NOT NULL,
  PlatId INT NOT NULL,
  Quantite INT NOT NULL,
  PRIMARY KEY (CommandeId, PlatId),
  FOREIGN KEY (CommandeId) REFERENCES Commande(CommandeId),
  FOREIGN KEY (PlatId) REFERENCES Plat(PlatId)
);

-- table Problème
CREATE TABLE Probleme (
    ProblemeId INT PRIMARY KEY,
    LivraisonId INT NOT NULL,
    Message TEXT,
    FOREIGN KEY (LivraisonId) REFERENCES Livraison(LivraisonId),
);