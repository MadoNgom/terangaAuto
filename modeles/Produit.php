<?php
class Produit{
    private $connexion; // Stocke la connexion à la base de données
    private $table = "Produit"; // Nom de la table "produits" dans la base de données

    public $id;
    public $nom;
    public $description;
    public $prixU;
    public $image;
    public $id_categories;
    public $id_Admin;

    public function __construct($db){
        $this->connexion = $db; // Initialise la connexion à la base de données
    }

    // Récupère tous les produits de la base de données avec leurs catégories
    public function lire(){
        try {
            $sql = "SELECT p.id, p.nom, p.description, p.prixU, p.image, c.nom AS categories_nom, p.id_Admin FROM Produit p LEFT JOIN categories c ON p.id_categories = c.id";
            return $this->connexion->query($sql);
        } catch(PDOException $exception) {
  // En cas d'erreur de connexion, affichez un message
         echo "Erreur de lire : "  . $exception->getMessage();
    }
    


    // Remplit les données de l'objet avec celles d'une ligne de la base de données
    //private function remplirDonnees($row){
       // $this->nom = $row['nom'];
       // $this->prix = $row['prix'];
       // $this->description = $row['description'];
        //$this->image = $row['image'];
    //}
}
public function creer($nom, $description, $prixU, $image, $id_categories, $id_Admin){
    if (!empty($nom) && !empty($description) && !empty($prixU) && !empty($image) && !empty($id_categories))
    {
        // Requête pour insérer un nouveau produit dans la table
        $sql = "INSERT INTO {$this->table} (nom, description, prixU, image, id_categories, id_Admin) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $query = $this->connexion->prepare($sql);
        $result = $query->execute([$nom, $description, $prixU, $image, $id_categories, $id_Admin]);

        if($result){
            return 1;
        } else {
            $errorInfo = $query->errorInfo();
            error_log("Erreur lors de l'insertion du produit : " . $errorInfo[2]);
            return 0;
        }
    } else {
        return 0;
    }
}

 // Supprime un produit de la base de données par son ID
 public function supprimer(){
    $sql = "DELETE FROM {$this->table} WHERE id = ?"; // Requête pour supprimer un produit par son ID
    $query = $this->connexion->prepare($sql); // Prépare la requête SQL
    return $query->execute([$this->id]); // Exécute la requête en spécifiant l'ID du produit à supprimer
}
// Met à jour un produit dans la base de données
public function modifier(){
    // Requête pour mettre à jour les détails d'un produit spécifique
    $sql = "UPDATE {$this->table} SET nom=?, prixU=?, description=?, id_categories=? WHERE id=?";
    $query = $this->connexion->prepare($sql); // Prépare la requête SQL
    $this->nettoyerEntrees(); // Nettoie les données pour éviter les injections SQL
    return $query->execute([$this->nom, $this->prixU, $this->description, $this->id_categories, $this->id]); // Exécute l
}
private function nettoyerEntrees(){
    $this->nom = htmlspecialchars(strip_tags($this->nom));
    $this->prixU = htmlspecialchars(strip_tags($this->prixU));
    $this->description = htmlspecialchars(strip_tags($this->description));
    $this->id_categories = htmlspecialchars(strip_tags($this->id_categories));
}



}