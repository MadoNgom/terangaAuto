<?php
include_once '../config/Database.php';
include_once '../modeles/Produit.php';

$database = new Database();
$db = $database->getConnexion();

$produits = new Produit($db);
$allproduit= $produits->lire();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des produits</title>
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/styles/style.css">
</head>
<body>


<div class="container listproduit">
  <?php foreach($allproduit as $key =>$produit){ ?>
  <div class="card" style="width: 18rem;">
   <img src="../assets/image/<?=$produit['image']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title"><?=$produit['nom']?></h4>
     <p><span class="prixU">PRICE: <?=$produit['prixU']?> K euro</span></p>
     <p class="card-text"><?=$produit['categories_nom']?></p>
       <div class="col-md-12">
           <a class="btn btn-outline-success" href="modifierProduit.php?id=<?=$produit['id']?>"><i class="bi bi-pencil-square"></i></a>
           <a class="btn btn-outline-danger" href="supprimeProduit.php?id=<?=$produit['id']?>"><i class="bi bi-trash"></i></a>
        </div>
     </div>
    </div>
  <?php } ?>
</div><br><br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>