<?php
class Categories {
    
    private $connexion;
    private $table = "categories";

    public $id;
    public $nom;
    public $description;

    // Constructeur prenant en paramètre la connexion à la base de données
    public function __construct($db){
        $this->connexion = $db;
    }

    // Méthode pour lire toutes les catégories depuis la base de données
    public function lireC(){
        $sql = "SELECT id, nom, description FROM {$this->table}";
        return $this->connexion->query($sql);
    }

    public function lireNom(){
        $sql = "SELECT nom FROM {$this->table}";
        return $this->connexion->query($sql);
    }

    // Méthode pour lire une catégorie spécifique par son ID
    public function lireUneCategorie(){
        $sql = "SELECT id, nom, description FROM {$this->table} WHERE id = ?";
        $query = $this->connexion->prepare($sql);
        $query->execute([$this->id]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $this->remplirDonnees($row);
    }

    // Méthode pour créer une nouvelle catégorie dans la base de données
    public function creer($nom, $description){
        if (!empty($nom) && !empty($description))
        {
            // Requête pour insérer un nouveau catégorie dans la table
            $sql = "INSERT INTO {$this->table} (nom, description) VALUES (?, ?)";
            $query = $this->connexion->prepare($sql);
            $result = $query->execute([$nom, $description]);
    
            if($result){
                return 1;
            } else {
                $errorInfo = $query->errorInfo();
                error_log("Erreur lors de l'insertion du catégorie : " . $errorInfo[2]);
                return 0;
            }
        } else {
            return 0;
        }
    }

    // Méthode pour mettre à jour une catégorie existante dans la base de données
    public function mettreAJour(){
        $sql = "UPDATE {$this->table} SET nom=?, description=? WHERE id=?";
        $query = $this->connexion->prepare($sql);
        $this->nettoyerEntrees();
        return $query->execute([$this->nom, $this->description, $this->id]);
    }

    // Méthode pour supprimer une catégorie existante de la base de données
    public function supprimer(){
        $sql = "DELETE FROM {$this->table} WHERE id=?";
        $query = $this->connexion->prepare($sql);
        return $query->execute([$this->id]);
    }

    // Méthode pour nettoyer les entrées afin d'éviter les injections SQL
    private function nettoyerEntrees(){
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->description = htmlspecialchars(strip_tags($this->description));
    }

    // Méthode privée pour remplir les données de l'objet avec celles récupérées depuis la base de données
    private function remplirDonnees($row){
        $this->nom = $row['nom'];
        $this->description = $row['description'];
    }
}
