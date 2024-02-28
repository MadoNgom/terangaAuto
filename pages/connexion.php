<?php
session_start();
require_once '../config/Database.php';

$db = new Database();
$connexion = $db->getConnexion();
$msg = "";

if(isset($_POST['valider'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $stmt = $connexion->prepare("SELECT * FROM User WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($pwd, $user['pwd'])) {
        $_SESSION['User'] = $user;
        if (isset($_GET['page'])) {
            header('location:'.$_GET['page'].'.php');
        } else {
            header("location:Accueil.php");
        }
    } else {
        $msg = "Informations invalides";
    }
}
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
       <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
       <link rel="stylesheet" href="../Assets/styles/connexion.css">
</head>
    <body>
<div class="bg-img">
        <div class="content">
            <header>Connexion</header>
            <form action="connexion.php" method="POST">
            <?php if($msg!=""){ ?>
                <div class="alert alert-danger" role="alert">
                  <?=$msg?>
                </div>
           <?php } ?>
                <div class="input-group mb-3">   
                    
                    <input type="email" name="email" placeholder="Enter votre email" class="form-control">
                </div>
                <div class="input-group">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="pwd" placeholder="Votre Mot de Pass" required class="form-control">
                </div>
                <div class="pass">
                    <a href="#">Mot de pass oublier?</a>
                </div>
                <div class="input-group ">
                    <input type="submit" name="valider" value="Connexion" class="btn btn-primary mb-3 px-3 fs-5 w-100 rounded-2">
                </div>
             <div class="login">Ou connectez-vous avec</div>
             <div class="link">
                 <div class="facebook">
                 <a href="https://www.facebook.com"target="_blank"><i class="bi bi-facebook" class="rounded-4"><span>Facebook</span></i></a> 
                 </div>
                 <div class="instagram">
                  <a href="https://www.instagram.com"target="_blank"><img src="../Assets/image/logo/google.png" alt="connection avec google" width="40px" class=" rounded-4 shadow"><span>Google</span></i></a>
                </div>
             </div>
             <div class="signup">Si tu n'as pas de compte
                 <a href="inscription.php">s'inscrire</a>
             </div>
            </form>
        </div>
    </div>

   </body>
</html>
