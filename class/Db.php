<?php

class Db
{
    public $user = 'root';
    public $password = 'root';
    public $host = 'localhost';
    public $port = 3306;
    private PDO $connection;


    function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=sqlProj;charset=utf8', $this->user, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->initDb();
    }

    private function initDb()
    {

        $tableQuery = "CREATE TABLE Adresse (
            AdresseId INT PRIMARY KEY,
            Numero INT NOT NULL,
            Rue VARCHAR(255) NOT NULL,
            Ville VARCHAR(255) NOT NULL,
            CodePostal INT NOT NULL,
            Pays VARCHAR(255) NOT NULL
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE Restaurant (
            RestaurantId INT PRIMARY KEY,
            Nom VARCHAR(255) NOT NULL,
            Ville VARCHAR(255) NOT NULL,
            AdresseId INT NOT NULL,
            FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId)
        )";

        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        } 

         
        $tableQuery = "CREATE TABLE Client (
            ClientId INT PRIMARY KEY,
            Nom VARCHAR(255) NOT NULL,
            Prenom VARCHAR(255) NOT NULL
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE Probleme (
            ProblemeId INT PRIMARY KEY,
            Message TEXT
        )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE Livraison (
            LivraisonId INT PRIMARY KEY,
            CommandeId INT NOT NULL,
            AdresseId INT NOT NULL,
            Effectue BOOLEAN NOT NULL,
            ProblemeId INT,
            FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId),
            FOREIGN KEY (ProblemeId) REFERENCES Probleme(ProblemeId)
        )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE Commande (
            CommandeId INT PRIMARY KEY,
            ClientId INT NOT NULL,
            RestaurantId INT NOT NULL,
            Date DATETIME NOT NULL,
            Prix INT NOT NULL,
            LivraisonId INT NOT NULL,
            Commentaire TEXT,
            FOREIGN KEY (clientId) REFERENCES Client(ClientId),
            FOREIGN KEY (LivraisonId) REFERENCES Livraison(LivraisonId),
            FOREIGN KEY (RestaurantId) REFERENCES Restaurant(RestaurantId)
        )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
        
        $tableQuery = "CREATE TABLE Plat (
            PlatId INT PRIMARY KEY,
            Nom VARCHAR(255) NOT NULL,
            Description TEXT,
            Prix DECIMAL(10,2) NOT NULL
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
        $tableQuery = "CREATE TABLE LienCommandePlat (
            CommandeId INT NOT NULL,
            PlatId INT NOT NULL,
            Quantite INT NOT NULL,
            PRIMARY KEY (CommandeId, PlatId),
            FOREIGN KEY (CommandeId) REFERENCES Commande(CommandeId),
            FOREIGN KEY (PlatId) REFERENCES Plat(PlatId)
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
    }

    
}

?>