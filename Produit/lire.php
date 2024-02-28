<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../modeles/Produit.php';

// Connexion à la base de données
$database = new Database();
$db = $database->getConnexion();

// Instanciation de la classe Produits
$produits = new Produit($db);

// Route pour récupérer tous les produits (GET)
// ... (votre code existant) ...

// Route pour récupérer tous les produits (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Appel de la méthode lire() pour obtenir tous les produits
    $result = $produits->lire();

    // Vérifiez si la requête a réussi
    if ($result !== null) {
        // Vérifiez si des résultats ont été retournés
        if ($result->rowCount() > 0) {
            $produits_arr = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                // Création d'un tableau associatif pour chaque produit
                $produit_item = array(
                    "id" => $id,
                    "nom" => $nom,
                    "description" => $description,
                    "prixU" => $prixU,
                    "image" => $image,
                    "id_Admin" => $id_Admin,
                    "categories_nom" => $categories_nom,
                );

                array_push($produits_arr, $produit_item);
            }

            http_response_code(200);
            echo json_encode($produits_arr);
        } else {
            // Si aucun résultat n'est retourné
            http_response_code(404);
            echo json_encode(array("message" => "Aucun produit trouvé."));
        }
    } else {
        // Gestion d'une erreur dans la requête
        http_response_code(500);
        echo json_encode(array("message" => "Erreur lors de la récupération des produits."));
    }
}
?>
