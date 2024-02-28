<?php
$connexion= new PDO ('mysql:host=localhost;dbname=TérangaAuto;','root','');
$message="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) &&  !empty($_POST['email'])&& !empty($_POST['pwd']))
    {
        $nom =htmlspecialchars($_POST['nom']);
        $prenom =htmlspecialchars ($_POST['prenom']);
        $email =htmlspecialchars($_POST['email']);
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT); 
        $profile;
        if (strlen($_POST['pwd'])<7)
        {
            $message = "Votre mot de passe est trop court";                                                                                                              
        }
        else
        {
            try {
                $insertion = $connexion->prepare("INSERT INTO User(nom,prenom,email,pwd,profile)Values(?,?,?,?,?)");
                $insertion->execute(array($nom,$prenom,$email,$pwd,"CLIENT"));
                $message = "Votre compte a bien été créé";
                header('location:connexion.php');
            } catch (\PDOException $exception) {
                $message = "Erreur de la création du compte".$exception->getmessage();

            }                                  
        }
    }
    else{
        $message ="Désolé mais cette utilisateur  à déjà un compte";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inscription</title>
	<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<section class="p-3">
	<div class="container d-flex justify-content-center align-items-center min-vh-100 ">
         <div class="row border rounded-4  bg-white shadow login">
               <div class="col-md-6">
				   <img src="../Assets/image/image.jpg" alt="voiture" class="img-fluid w-100 h-100 rounded-4 " >
			   </div>
		<form action="login.php" method="POST" class="col-md-6 p-2">
		<?php if ($message!="") { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$message; ?>
                </div>
            <?php } ?> 
			<h3 class="text-center mb-4">Bienvenu à Teranga Auto !</h3>
			<div class="row mb-3">
				<div class="col">
				   <div class="input-group mb-4">
					<input type="text" name="nom" class="form-control " placeholder="Nom">
				    </div>
				</div>
				<div class="col">
				   <div class="input-group mb-4">
					<input type="text" name="prenom" class="form-control " placeholder="Prenom">
				  </div>
				</div>
				
			</div>
			<div class="input-group mb-4">
				<input type="email" name="email" placeholder="email" class="form-control mb-4">
			</div>
			<div class="input-group mb-4">
				<input type="password" name="pwd" placeholder="Mot de Pass" class="form-control ">
			</div>
			<div class="input-group mb-4">
				<input type="checkbox"  id="formCheck" class="form-check-input me-2">
				<label for="formCheck" class="form-check-label "><span>Se Souvenir de moi</span> </label>
			</div>
			<div class="input-group">
			<input type="submit" name="valider" value="S'incrire" class="btn btn-dark mb-4 px-3 fs-6 rounded-3">
				<button type="button" class="btn btn-primary mb-3 px-3 fs-5 w-100 rounded-2" ><i class="bi bi-facebook me-2 "></i>S'inscrire avec facebook</button>
				<button class="btn btn-light btn-light fs-5 w-100 rounded-2"><img src="../Assets/image/logo/google.png" alt="" width="40px" class="me-2"><span>S'inscrire avec Google</span></button>
			</div>
		</form>	   
	</section>
</body>
</html>