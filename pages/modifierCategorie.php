<?php
include_once '../config/Database.php';
include_once '../modeles/categories.php';

$database = new Database();
$db = $database->getConnexion();

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {

    $sqlState = $db->prepare('SELECT * FROM categories WHERE id=?');
    $sqlState->execute([$id]);
    $categories =  $sqlState->fetch(PDO::FETCH_ASSOC);
    if (!$categories) {
        die("Le categories avec l'ID spécifié n'existe pas");
    }

    if (isset($_POST['modifier'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];

        if (!empty($nom) && !empty($description)) {
            $sqlUpdate = $db->prepare('UPDATE categories SET nom=?, description=? WHERE id=?');
            $sqlUpdate->execute([$nom, $description, $id]);
            header('location:Categorie.php');
            exit();
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Les champs sont obligatoires!
            </div>
            <?php
        }
    }
} else {
    die('ID du Categories non spécifié');
}
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/styles/forme.css">
    <title>Modifier Categorie</title>
</head>
<body>
    
<form action="modifierCategorie.php?id=<?=$categories['id']?>" method="POST" enctype="multipart/form-data" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="Nom" class="form-label">Nom</label>
    <input name="nom"value="<?=$categories['nom']?>" type="text" class="form-control" id="Nom">
  </div>
    <div class="col-md-6">
     <label for="exampleFormControlTextarea1" class="form-label">description</label>
     <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$categories['description']?></textarea>
   </div>
  <div class="col-12">
  <button name="modifier" type="submit" class="btn btn-primary">Modifier</button>

  </div>
  
</form><br><br><br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>