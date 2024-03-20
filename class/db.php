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
        //$this->initDb();
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

        $fillQuery="INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (10,'Rue du carré','Paris','95000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (11,'Rue du triangle','Marseille','13000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (145,'Rue du rond','Lyon','69000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (900,'Rue du losange','Bordeaux','33000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (340,'Rue de lovale','Nice','06000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (6,'Rue du rectangle','Tououse','31000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (234,'Rue du pentagone','Rennes','35000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (645,'Rue de lexagone','Strasbourg','67000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (12,'Rue de loctogone','Lille','59000', 'France');
        INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (145,'Rue du dodecahedre-rhombique','Nantes','44000', 'France');";
        if (!$this->connection->query($fillQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
        
        $fillQuery="INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Le Petit Bistro', 'Paris', 1);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('La Brasserie', 'Marseille', 2);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Chez Jean', 'Lyon', 3);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Le Jardin Gourmand', 'Bordeaux', 4);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('La Table Provençale', 'Nice', 5);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Le Bistrot du Coin', 'Toulouse', 6);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('La Crêperie Bretonne', 'Rennes', 7);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Le Restaurant Gastronomique', 'Strasbourg', 8);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('La Pizzeria', 'Lille', 9);
        INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Le Café Parisien', 'Nantes', 10);";
        if (!$this->connection->query($fillQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
        
        $fillQuery="-- Création du plat Carbonara
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Carbonara', 'Pâtes, lardons, œufs, parmesan', 12.99);
        
        -- Création du plat Pizza
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Pizza', 'Pâte à pizza, sauce tomate, fromage, garniture au choix', 10.99);
        
        -- Création du plat Ravioli
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Ravioli', 'Pâte à ravioli, farce au choix', 8.99);
        
        -- Création du plat Lasagne
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Lasagne', 'Pâtes, sauce bolognaise, béchamel, fromage', 14.99);
        
        -- Création du plat Burger
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Burger', 'Pain à burger, viande, fromage, légumes, sauce', 9.99);
        
        -- Création du plat Saint Honoré
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Saint Honoré', 'Pâte feuilletée, crème pâtissière, caramel', 7.99);
        
        -- Création du plat Merveilleux
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Merveilleux', 'Meringue, crème chantilly, chocolat', 6.99);
        
        -- Création du plat Profiteroles
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Profiteroles', 'Pâte à choux, crème pâtissière, chocolat chaud', 8.99);";
        if (!$this->connection->query($fillQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
    }


    public function getPlats()
    {
        $query = "SELECT * FROM Plat";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRestaurants()
    {
        $query = "SELECT restaurant.*, adresse.* FROM restaurant JOIN adresse ON restaurant.AdresseId = adresse.AdresseId GROUP BY restaurant.RestaurantId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function AddOrReturnAdresse($Adresse)
    {
        $query = "SELECT * FROM Adresse WHERE Numero = :Numero AND Rue = :Rue AND Ville = :Ville AND CodePostal = :CodePostal AND Pays = :Pays";
        $stmt = $this->connection->prepare($query);
        $stmt->execute($Adresse);
        $result = $stmt->fetch();
        if ($result == false) {
            $query = "INSERT INTO Adresse (Numero, Rue, Ville, CodePostal, Pays) VALUES (:Numero, :Rue, :Ville, :CodePostal, :Pays)";
            $stmt = $this->connection->prepare($query);
            $stmt->execute($Adresse);
            $query = "SELECT * FROM Adresse WHERE Numero = :Numero AND Rue = :Rue AND Ville = :Ville AND CodePostal = :CodePostal AND Pays = :Pays";
            $stmt = $this->connection->prepare($query);
            $stmt->execute($Adresse);
            $result = $stmt->fetch();
        }
        return $result;
    }

    public function AddOrReturnClient($Client)
    {
        $query = "SELECT * FROM Client WHERE Nom = :Nom AND Prenom = :Prenom";
        $stmt = $this->connection->prepare($query);
        $stmt->execute($Client);
        $result = $stmt->fetch();
        if ($result == false) {
            $query = "INSERT INTO Client (Nom, Prenom) VALUES (:Nom, :Prenom)";
            $stmt = $this->connection->prepare($query);
            $stmt->execute($Client);
            $query = "SELECT * FROM Client WHERE Nom = :Nom AND Prenom = :Prenom";
            $stmt = $this->connection->prepare($query);
            $stmt->execute($Client);
            $result = $stmt->fetch();
        }
        return $result;
    }





    
}

?>