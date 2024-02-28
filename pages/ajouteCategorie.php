<?php
include_once '../config/Database.php';
include_once '../modeles/categories.php';

$database = new Database();
$db = $database->getConnexion();

$categories = new categories($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom=htmlspecialchars($_POST['nom']);
    $description=htmlspecialchars($_POST['description']);
    $result =$categories->creer($nom, $description);
    if ($result==1){
      echo "ajout reussi!";
    }
    $msg = "Une erreur c'est produit";

  
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
    <title>Ajout Categorie</title>
</head>
<body>
    
<form action="ajouteCategorie.php" method="POST" enctype="multipart/form-data" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="Nom" class="form-label">Nom</label>
    <input name="nom" type="texte" class="form-control" id="Nom">
  </div>
    <div class="col-md-6">
     <label for="exampleFormControlTextarea1" class="form-label">description</label>
     <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   </div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">ajouter</button>
  </div>
  
</form><br><br><br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>