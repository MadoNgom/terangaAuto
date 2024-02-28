<?php
include_once '../config/Database.php';
include_once '../modeles/categories.php';

$database = new Database();
$db = $database->getConnexion();

$categories = new categories($db);
$allcategories= $categories->lireC();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
<table class="table table-striped"  action="Categorie.php"method="POST" class="table1">
  <thead>
       <tr>
           <th>Nom</th>
           <th>Description</th>
           <th>Action</th>

       </tr>
  </thead>
  <tbody>
  <?php
      foreach ($allcategories as $key => $categories) {?>
         <tr>
               <td><?= $categories['nom'] ?></td>
               <td><?= $categories['description'] ?></td>
               <td class="text-success"><a href="modifierCategorie.php?id=<?=$categories['id']?>"><i class="bi bi-pencil-square"></i></a></td>
               <td class="text-danger"><a href="supprimerCategorie.php?id=<?=$categories['id']?>"><i class="bi bi-trash"></i></a></td>
         </tr>
  <?php } ?>
  </tbody>
</table><br><br>
</body>
</html>