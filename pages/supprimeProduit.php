<?php
include_once '../config/Database.php';
include_once '../modeles/Produit.php';

$database = new Database();
$db = $database->getConnexion();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id){
    $sqlState = $db->prepare('DELETE  FROM Produit WHERE id=?');
    $sqlState->execute([$id]);
    header('location: Produit.php');
    exit();
}
else {
    die('ID du produit non spécifié');
}
?>