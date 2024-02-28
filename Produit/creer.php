<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../modeles/Produit.php';

// Route pour créer un nouveau produit (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données envoyées via POST
    $data = json_decode(file_get_contents("php://input"));

    // Assignation des valeurs pour créer un nouveau produit
    $produits->nom = $data->nom;
    $produits->description = $data->description;
    $produits->prixU = $data->prixU;
    $produits->image = $data->image;
    $produits->id_categories = $data->id_categories;
    $produits->id_Admin = $data->id_Admin;


    // Assigner les autres attributs

    if ($produits->creer()) {
        http_response_code(201);
        echo json_encode(array("message" => "Produit créé."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Impossible de créer le produit."));
    }
}

