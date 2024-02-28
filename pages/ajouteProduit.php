<?php
include_once '../config/Database.php';
include_once '../modeles/Produit.php';
include_once '../modeles/categories.php';

$database = new Database();
$db = $database->getConnexion();

$produits = new Produit($db);
$id_Admin=1;

function telechargeImage($imageInfos){
  $nomImage=$imageInfos['name'];
  // le chemin d'accer
  $imagePath = $imageInfos['tmp_name'];
  //cest cette fonction qui fait le telecharger
  if(move_uploaded_file($imagePath,"../Assets/image/".$nomImage)){
    return $nomImage;
  } 
  return "";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom=htmlspecialchars($_POST['nom']);
    $description=htmlspecialchars($_POST['description']);
    $prixU=htmlspecialchars($_POST['prixU']);
    $image= telechargeImage($_FILES['image']);
    $id_categories=htmlspecialchars($_POST['id_categories']);
    $result =$produits->creer($nom, $description, $prixU, $image, $id_categories, $id_Admin);
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
    <title>Ajout Produit</title>
</head>
<body>
    
<form action="ajouteProduit.php" method="POST" enctype="multipart/form-data" class="row g-3 boutiquierform">
  <div class="col-md-6">
    <label for="Nom" class="form-label">Nom</label>
    <input name="nom" type="texte" class="form-control" id="Nom">
  </div>
    <div class="col-md-6">
     <label for="exampleFormControlTextarea1" class="form-label">description</label>
     <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
   </div>
   <div class="col-md-6">
   <label for="prixU" class="form-label">prix Unitaire</label>
    <input name="prixU" type="number" class="form-control" id="prixU">
  </div>
   <div class="col-md-6">
      <label for="formFile" class="form-label">Image du produit</label>
      <input name="image" class="form-control" type="file" id="formFile">
  </div>
  <div class="col-md-6">
    <select name="id_categories" class="form-select" aria-label="Default select example">
        <?php
        // Assurez-vous que vous avez déjà créé une connexion PDO (à la place de mysqli)
        $connexion = new PDO('mysql:host=localhost;dbname=TérangaAuto;','root','');

        // Utilisez une requête préparée pour éviter les attaques par injection SQL
        $query = $connexion->prepare("SELECT id, nom FROM categories");
        $query->execute();

        while ($ctgorie = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <option value="<?php echo $ctgorie['id']; ?>"><?php echo $ctgorie['nom']; ?></option>
            <?php
        }
        ?>
    </select>
</div>
  <div class="col-12">
    <button name="click" type="submit" class="btn btn-primary">ajouter</button>
  </div>
  
</form><br><br><br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>