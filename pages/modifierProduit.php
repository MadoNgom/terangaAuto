<?php
include_once '../config/Database.php';
include_once '../modeles/Produit.php';

$database = new Database();
$db = $database->getConnexion();

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {

    $sqlState = $db->prepare('SELECT * FROM Produit WHERE id=?');
    $sqlState->execute([$id]);
    $produit =  $sqlState->fetch(PDO::FETCH_ASSOC);
    if (!$produit) {
        die("Le produit avec l'ID spécifié n'existe pas");
    }

    if (isset($_POST['modifier'])) {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $prixU = $_POST['prixU'];
        $image = $produit['image'];

        if (!empty($nom) && !empty($description) && !empty($prixU)&& !empty($id_categories)) {
            $sqlUpdate = $db->prepare('UPDATE Produit SET nom=?, description=?, prixU=?, id_categories=? WHERE id=?');
            $sqlUpdate->execute([$nom, $description, $prixU, $id_categories, $id]);
            header('location: Produit.php');
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
    die('ID du produit non spécifié');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produit</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/styles/form.css">
    <link rel="stylesheet" href="../assets/styles/list.css">
</head>

<body>
<form action="modifierProduit.php?id=<?=$produit['id']?>" method="POST" enctype="multipart/form-data" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="Nom" class="form-label">Nom</label>
    <input name="nom" value="<?=$produit['nom']?>" type="text" class="form-control" id="Nom">
  </div>
   <div class="mb-3">
     <label for="exampleFormControlTextarea1" class="form-label">description</label>
     <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$produit['description']?></textarea>
   </div>
   <div class="col-md-6">
   <label for="prixU" class="form-label">prix Unitaire</label>
    <input name="prixU" value="<?=$produit['prixU']?>" type="number" class="form-control" id="prixU">
  </div>
  <div class="col-md-6">
    <label for="formFile" class="form-label">Image du produit</label>
    <input name="image" class="form-control" type="file" id="formFile">
 </div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">Modifier</button>
  </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>