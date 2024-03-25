<?php

class Db
{
    public $user = 'root';
    public $password = 'root';
    public $host = 'localhost';
    public $port = 3306;

    public $dbname = 'sqlProj';
    private PDO $connection;


    function __construct()
    {
        $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->user, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$this->initDb();
        //$this->fillTables();
    }


    private function initDb()
    {

        $tableQuery = "CREATE TABLE IF NOT EXISTS Adresse (
            AdresseId INT PRIMARY KEY AUTO_INCREMENT,
            Numero INT NOT NULL,
            Rue VARCHAR(255) NOT NULL,
            Ville VARCHAR(255) NOT NULL,
            CodePostal INT NOT NULL,
            Pays VARCHAR(255) NOT NULL
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE IF NOT EXISTS  Restaurant (
            RestaurantId INT PRIMARY KEY AUTO_INCREMENT,
            Nom VARCHAR(255) NOT NULL,
            Ville VARCHAR(255) NOT NULL,
            AdresseId INT NOT NULL,
            FOREIGN KEY (AdresseId) REFERENCES Adresse(AdresseId)
        )";

        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }


        $tableQuery = "CREATE TABLE IF NOT EXISTS  Client (
            ClientId INT PRIMARY KEY AUTO_INCREMENT,
            Nom VARCHAR(255) NOT NULL,
            Prenom VARCHAR(255) NOT NULL
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE IF NOT EXISTS  Probleme (
            ProblemeId INT PRIMARY KEY AUTO_INCREMENT,
            Message TEXT
        )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE IF NOT EXISTS  Livraison (
            LivraisonId INT PRIMARY KEY AUTO_INCREMENT,
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

        $tableQuery = "CREATE TABLE IF NOT EXISTS  Commande (
            CommandeId INT PRIMARY KEY AUTO_INCREMENT,
            ClientId INT NOT NULL,
            RestaurantId INT NOT NULL,
            Date DATETIME NOT NULL,
            Prix INT NOT NULL,
            Commentaire TEXT,
            FOREIGN KEY (clientId) REFERENCES Client(ClientId),
            FOREIGN KEY (RestaurantId) REFERENCES Restaurant(RestaurantId)
        )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }

        $tableQuery = "CREATE TABLE IF NOT EXISTS  Plat (
            PlatId INT PRIMARY KEY AUTO_INCREMENT,
            Nom VARCHAR(255) NOT NULL,
            Description TEXT,
            Prix DECIMAL(10,2) NOT NULL
          )";
        if (!$this->connection->query($tableQuery) != false) {
            echo "Error creating table: " . $this->connection->errorInfo();
        }
        $tableQuery = "CREATE TABLE IF NOT EXISTS  LienCommandePlat (
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

    public function fillTables()
    {


        $fillQuery = "INSERT INTO adresse (Numero,Rue, Ville,CodePostal, Pays) VALUES (10,'Rue du carré','Paris','95000', 'France');
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
        $fillQuery = "INSERT INTO restaurant (Nom, Ville, AdresseId) VALUES ('Le Petit Bistro', 'Paris', 1);
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

        $fillQuery = "-- Création du plat Carbonara
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Carbo Bien Mouillé', 'Pâtes, lardons, œufs, parmesan', 12.99);

        -- Création du plat Steak Frites
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Steak Trique', 'Steak, Pomme de terres, Salade, Sauce Blanche', 10.99);
        
        -- Création du plat Pizza
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Pizza Dans Ton Ananas', 'Pâte à pizza, sauce tomate, fromage, garniture au choix', 10.99);
        
        -- Création du plat Ravioli
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Donne Moi Ton Ravioli', 'Pâte à ravioli, farce au choix', 8.99);
        
        -- Création du plat Lasagne
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Lasagne à 4 pattes', 'Pâtes, sauce bolognaise, béchamel, fromage', 14.99);
        
        -- Création du plat Burger
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Burger Bien Gaulé', 'Pain à burger, viande, fromage, légumes, sauce', 9.99);
        
        -- Création du plat Saint Honoré
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Saint-Hono-Raie', 'Pâte feuilletée, crème pâtissière, caramel', 7.99);
        
        -- Création du plat Merveilleux
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Merveilleux Tout Chaud', 'Meringue, crème chantilly, chocolat', 6.99);
        
        -- Création du plat Profiteroles
        INSERT INTO plat (Nom, Description, Prix)
        VALUES ('Francky Je Sens Tes Profiteroles', 'Pâte à choux, crème pâtissière, chocolat chaud', 8.99);";
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
        $query = "SELECT * FROM adresse WHERE Numero = :Numero AND Rue = :Rue AND Ville = :Ville AND CodePostal = :CodePostal AND Pays = :Pays";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':Numero', $Adresse[0]);
        $stmt->bindParam(':Rue', $Adresse[1]);
        $stmt->bindParam(':Ville', $Adresse[2]);
        $stmt->bindParam(':CodePostal', $Adresse[3]);
        $stmt->bindParam(':Pays', $Adresse[4]);
        $stmt->execute();
        $result = $stmt->fetch();
        echo $result;
        if ($result == false) {
            $query = "INSERT INTO adresse (Numero, Rue, Ville, CodePostal, Pays) VALUES (:Numero, :Rue, :Ville, :CodePostal, :Pays)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':Numero', $Adresse[0]);
            $stmt->bindParam(':Rue', $Adresse[1]);
            $stmt->bindParam(':Ville', $Adresse[2]);
            $stmt->bindParam(':CodePostal', $Adresse[3]);
            $stmt->bindParam(':Pays', $Adresse[4]);
            $stmt->execute();

            $query = "SELECT * FROM adresse WHERE Numero = :Numero AND Rue = :Rue AND Ville = :Ville AND CodePostal = :CodePostal AND Pays = :Pays";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':Numero', $Adresse[0]);
            $stmt->bindParam(':Rue', $Adresse[1]);
            $stmt->bindParam(':Ville', $Adresse[2]);
            $stmt->bindParam(':CodePostal', $Adresse[3]);
            $stmt->bindParam(':Pays', $Adresse[4]);
            $stmt->execute();
            $result = $stmt->fetch();
        }
        return $result;
    }

    public function AddOrReturnClient($Client)
    {
        $query = "SELECT * FROM Client WHERE Nom = :Nom AND Prenom = :Prenom";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':Nom', $Client[0]);
        $stmt->bindParam(':Prenom', $Client[1]);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result == false) {
            $query = "INSERT INTO Client (Nom, Prenom) VALUES (:Nom, :Prenom)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':Nom', $Client[0]);
            $stmt->bindParam(':Prenom', $Client[1]);
            $stmt->execute();
            $query = "SELECT * FROM Client WHERE Nom = :Nom AND Prenom = :Prenom";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':Nom', $Client[0]);
            $stmt->bindParam(':Prenom', $Client[1]);
            $stmt->execute();
            $result = $stmt->fetch();
        }
        return $result;
    }

    public function SetProbleme($CommandeId)
    {
        $Message = "Probleme de livraison";
        $query = "INSERT INTO Probleme (Message) VALUES (:Message)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["Message" => $Message]);
        $ProblemeId = $this->connection->lastInsertId();
        $query = "UPDATE Livraison SET ProblemeId = :ProblemeId WHERE CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["ProblemeId" => $ProblemeId, "CommandeId" => $CommandeId]);
        return $Message;
    }

    public function AddOrReturnLivraison($Adresse, $CommandeId)
    {
        $toreturn = array();
        $query = "INSERT INTO Livraison (AdresseId,CommandeId, Effectue) VALUES (:AdresseId,:CommandeId, 0)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':AdresseId', $Adresse["AdresseId"]);
        $stmt->bindParam(':CommandeId', $CommandeId);
        $stmt->execute();

        if ($this->createProblem()) {
            $toreturn["Probleme"] = $this->SetProbleme($CommandeId);
        }

        $query = "SELECT * FROM Livraison WHERE AdresseId = :AdresseId AND Effectue = 0";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':AdresseId', $Adresse["AdresseId"]);
        $stmt->execute();
        $toreturn["livraison"] = $stmt->fetch();
        return $toreturn;
    }

    public function createProblem()
    {
        $randomNumber = rand(1, 10);
        if ($randomNumber == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function GetInfoFromPlatName($Nom)
    {
        $query = "SELECT * FROM plat WHERE Nom = :Nom";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':Nom', $Nom);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function GetInfoFromRestaurantName($Nom)
    {
        $query = "SELECT * FROM Restaurant WHERE Nom = :Nom";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["Nom" => $Nom]);
        return $stmt->fetch();
    }

    public function AddPlatsCommande($plats, $CommandeId)
    {
        $prix = 0;
        $Quantite = 0;
        foreach ($plats as $plat) {
            $platInfo = $this->GetInfoFromPlatName($plat);
            $prix += $platInfo["Prix"];
            $Quantite++;
        }

        $query = "INSERT INTO LienCommandePlat (CommandeId, PlatId, Quantite) VALUES (:CommandeId, :PlatId, :Quantite)";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["CommandeId" => $CommandeId, "PlatId" => $platInfo["PlatId"], "Quantite" => $Quantite]);

        return $prix;
    }



    public function AddCommande($plats, $restaurant, $commentaire, $Adresse, $client)
    {
        $Adresse = $this->AddOrReturnAdresse($Adresse);
        $Client = $this->AddOrReturnClient($client);
        $query = "INSERT INTO Commande (ClientId, RestaurantId, Date, Prix, Commentaire) VALUES (:ClientId, :RestaurantId, :Date, 0, :Commentaire)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':ClientId', $Client["ClientId"]);
        $stmt->bindParam(':RestaurantId', $this->GetInfoFromRestaurantName($restaurant)["RestaurantId"]);
        $stmt->bindParam(':Date', date("Y-m-d H:i:s"));
        $stmt->bindParam(':Commentaire', $commentaire);
        $stmt->execute();
        $commandeId = $this->connection->lastInsertId();
        $prix = $this->AddPlatsCommande($plats, $this->connection->lastInsertId());
        $query = "UPDATE Commande SET Prix = :Prix WHERE CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["Prix" => $prix, "CommandeId" => $commandeId]);
        $query = "SELECT * FROM commande WHERE CommandeId = :CommandeId ";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["CommandeId" => $commandeId]);
        $toreturn = $stmt->fetch();
        $Message = $this->AddOrReturnLivraison($Adresse, $commandeId);
        if (isset ($Message["Probleme"])) {
            $toreturn["Probleme"] = $Message["Probleme"];
        }
        return $toreturn;
    }

    public function DeleteCommande($id)
    {

        $query = "DELETE FROM LienCommandePlat WHERE CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["CommandeId" => $id]);
        $query = "DELETE FROM Livraison WHERE CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["CommandeId" => $id]);
        $query = "DELETE FROM Commande WHERE CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["CommandeId" => $id]);
    }

    public function UpdateCommande($id, $commentaire, $Adresse)
    {
        $Adresse = $this->AddOrReturnAdresse($Adresse);
        $query = "UPDATE Commande
                  JOIN Livraison ON Commande.CommandeId = Livraison.CommandeId
                  JOIN Adresse ON Livraison.AdresseId = Adresse.AdresseId
                  SET Commande.Commentaire = :Commentaire, Livraison.AdresseId = :AdresseId
                  WHERE Commande.CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["Commentaire" => $commentaire, "AdresseId" => $Adresse["AdresseId"], "CommandeId" => $id]);
        $query = "SELECT * FROM Commande WHERE CommandeId = :CommandeId";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(["CommandeId" => $id]);
        return $stmt->fetch();
    }




    public function GetCommandes()
    {
        $query = "SELECT * FROM Commande";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>