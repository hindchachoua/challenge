<?php


include_once 'connection\conn.php';


class produit {


    private $id;
    private $nom;
    private $prix;
    private $stock;


    public function __construct($id, $nom, $prix, $stock) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->stock = $stock;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }


    public function afficherDetails() {
        echo "Nom: {$this->nom}, Prix: {$this->prix} \n";
    }
}


class produitDAO {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM produit";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $results = [];
        foreach ($products as $product) {
            $results[] = new produit($product['id'], $product['nom'], $product['prix'], $product['stock']);
        }
        return $results;
    }

    public function getProduct($id) {
            $sql = "SELECT * FROM produit WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultadata = $stmt->fetch(PDO::FETCH_ASSOC);
            $result = null;

            foreach ($resultadata as $row){
                $result = new produit($row['id'], $row['nom'], $row['prix'], $row['stock']);
            }
            return $result;
    }


    

}


class produitPhysique extends produit {
    protected $poids;

    public function __construct($id, $nom, $prix, $stock, $poids) {
        parent::__construct($id, $nom, $prix, $stock);
        $this->poids = $poids;
    }

    public function afficherDetails() {
        parent::afficherDetails();
        echo "Poids: {$this->poids} kg ";
    }
}

class produitNumerique extends produit {
    protected $taille;

    public function __construct($id, $nom, $prix, $stock, $taille) {
        parent::__construct($id, $nom, $prix, $stock);
        $this->taille = $taille;
    }

    public function afficherDetails() {
        parent::afficherDetails();
        echo "Taille: {$this->taille} ";
    }
}






?>