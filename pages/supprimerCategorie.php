<?php
include_once '../config/Database.php';
include_once '../modeles/categories.php';

$database = new Database();
$db = $database->getConnexion();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id){
    $sqlState = $db->prepare('DELETE  FROM categories WHERE id=?');
    $sqlState->execute([$id]);
    header('location:Categorie.php');
    exit();
}
else {
    die('ID du categories non spécifié');
}
?>