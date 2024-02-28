<?php
include_once '../config/Database.php';
include_once '../modeles/Produit.php';
$database = new Database();
$db = $database->getConnexion();

// Instanciation de la classe Produits
$produits = new Produit($db);
$allproduit= $produits->lire();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/styles/style.css"  />
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
   
    
    <title>Accueil</title>
    
  </head>
  <body> 
   
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Teranga Auto</a>
        <button
          class="navbar-toggler border-0 shadow-none"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasDarkNavbar"
          aria-controls="offcanvasDarkNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-start text-bg-dark"
          tabindex="-1"
          id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
              Teranga auto
            </h5>
            <button
              type="button"
              class="btn-close btn-close-white border-0 shadow-0"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul
              class="navbar-nav justify-content-center flex-grow-1 pe-3 align-items-center"
            >
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Accueil</a
                >
              </li>
              
              <li class="nav-item text-white">
  
              <li class="nav-item dropdown">

              <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Produits
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li>
                    <a class="dropdown-item" href="./ajouteProduit.php" target="_blank">Ajout Produits</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="./Produit.php" target="_blank">Afficher les produits</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                </ul>
              </li>
          <li class="nav-item dropdown">
    <a
                          class="nav-link dropdown-toggle"
                          href="#"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
              >
                Categories
              </a>
  <ul class="dropdown-menu dropdown-menu-dark">
    <li>
      <a class="dropdown-item" href="./ajouteCategorie.php" target="_blank">Ajout Categories</a>
    </li>
    <li>
      <a class="dropdown-item" href="./Categorie.php" target="_blank">Afficher les Categories</a>
    </li>
    <li>
      <hr class="dropdown-divider" />
    </li>
  </ul>
</li>
   </ul>
            <form class="d-flex align-items-center mt-lg-0 mt-4" role="search">
              <input
                class="form-control me-2 rounded-4"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
            </form>
            <div class="buttons mt-lg-0 mt-4 text-center">
              <a href="./inscription.php"
                class="btn btn-outline-success rounded-5 align-self-center"
                target="_blank"
              >
                S'inscrire
                </a>
                  </li>
                  </li>
              <a class="btn btn-outline-success rounded-5 " href="./connexion.php" target="_blank">
                Se connecter
                </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  
    <!-- FIN DE LA BARRE DE NAVIGATION -->
     
   <section class="first-section">
      <!-- <div class="container">
        <div class="row">
          <div class="col ">
            <div class="section-text">
              <h1 class="section-title ">Level up your style <br> Be free </h1>
              <p>Lorem ipsum dolor sit amet consectetur  <br> adipisicing elit. Culpa reprehenderit, aliquam</p>
              <button class="btn-blue" type="button">Explore Services</button>
            </div>
            <div class="icon">
               <span class="col">
                <a href="https://www.facebook.com/" target="_blank">
                  <i class="bi bi-facebook"></i>
                </a>
             </span>
               <span class="col">
                <a href="#">
                  <i class="bi bi-twitter"></i>
                </a>
               </span>
               <span class="col">
                <a href="#"><i class="bi bi-instagram"></i></a>
              </span>
            </div>
          </div>
          <div class="col">
            <img src="../Assets/image/car-8-removebg-preview.png" alt="image de banner"  class=" img-fluid col-img " >
          </div>
        </div>
      </div> -->
   </section>
   <!-- FIN DE NOTRE SECTION -->
   <section class="py-5">
    <h1 class="text-center">Nos Partenairs</h1>
    <div class="container">
    <div class="row mt-4 align-items-center">
      <div class="col">
         <img src="../Assets/image/logo/bmw-1_130x84.jpg" alt="" width="80px">
      </div>
      <div class="col ">
      <img src="../Assets/image/logo/Mazda-Logo-2018-present_130x84.jpg" alt="" width="80px">
    
      </div>
      <div class="col">
      <img src="../Assets/image/logo/Hyundai_130x84.jpg" alt="" width="80px">
      
      </div>
      <div class="col">
      <img src="../Assets/image/logo/peugeot_130x84.jpg" alt="" width="80px">
      
      </div>
      <div class="col">
      <img src="../Assets/image/logo/nissan_130x84.jpg" alt="" width="80px">
      
      </div>
    </div>
    </div>
   </section>
   <section>
    <section class="container ">
      <h2 class="section-text text-center mb-3">
        Nos Meilleures Ventes
      </h2>
    <div class="listproduit">
         <?php foreach ($allproduit as $key => $produit) { ?>
          <div class="card rounded-3 shadow p-2">
          <img src="../assets/image/<?=$produit['image']?>" class="card-img-top rounded-3" alt="voiutre de luxe" >
          <div class="card-body">
            <h5 class="card-title "><?=$produit['nom']?> </h5>
            <div class="two-col">
              <div class="right">
               <div class=" text-black-50  "><i class="bi bi-person-check text-primary fs-5 me-2"></i>20person</div>
               <div class=" text-black-50"> <i class="bi bi-speedometer text-primary fs-5 me-2"></i>6.3km/1-Litre</div>
                 
              </div>
              <div class="left">
              <div class=" text-black-50"><i class="bi bi-ev-station text-primary fs-5 me-2"></i>Hybrid</div>
               <div class=" text-black-50"><i class="bi bi-ev-front text-primary fs-5 me-2"></i>Automatic</div>
              </div>
            </div>
            <!-- <p class="text">Category : <?=$produit['categories_nom']?></p> -->
            <hr>
            <div class="two-col">
              <div class="right">
               <p><span class="prixU text-black-50"> Price:$<?=$produit['prixU']?>k </span></p>
                 
              </div>
              <div class="left">
              <span class="heart"><i class="bi bi-heart"></i></span>
              <a class="btn btn-primary" href="page/ajoutPanier.php?idProduit=<?=$produit['id']?>">Acheter</a>
              </div>
            </div>
            
          </div>
          </div>
          <?php }?>
         </div>
    </section>
   </section>
   <!-- TESTI?ONIAL SECTION -->
   <section class="home-testimonial-bottom">
            <div class="container testimonial-inner">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">&ldquo;At this School, our mission is to balance a rigorous comprehensive college preparatory curriculum with healthy social and emotional development.&rdquo;</div>
                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="https://images.pexels.com/photos/6625914/pexels-photo-6625914.jpeg" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Balbir Kaur</div>
                                <div class="link-position d-flex justify-content-center">Student</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">&ldquo;At this School, our mission is to balance a rigorous comprehensive college preparatory curriculum with healthy social and emotional development.&rdquo;</div>
                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Balbir Kaur</div>
                                <div class="link-position d-flex justify-content-center">Student</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 style-3">
                        <div class="tour-item ">
                            <div class="tour-desc bg-white">
                                <div class="tour-text color-grey-3 text-center">&ldquo;At this School, our mission is to balance a rigorous comprehensive college preparatory curriculum with healthy social and emotional development.&rdquo;</div>
                                <div class="d-flex justify-content-center pt-2 pb-2"><img class="tm-people" src="https://images.pexels.com/photos/4946604/pexels-photo-4946604.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt=""></div>
                                <div class="link-name d-flex justify-content-center">Balbir Kaur</div>
                                <div class="link-position d-flex justify-content-center">Student</div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    
  <!-- FOOTER SECTION -->
    <footer class="footer  mt-4 p-5 bg-dark text-light fs-6">
      <div class="container">
        <div class="row">
          <!-- COLUMN  -->
            <div class="col">
              <div class="footer-col">
                <h4 class="mb-3">Accueil</h4>
                <ul class="fs-6 list-unstyled">
                  <li ><a href="#" class="fs-7 text-decoration-none text-white-50">Nous contacter</a></li>
                  <li><a href="#"class="fs-7 text-decoration-none text-white-50">Nos services</a></li>
                  <li><a href="#"class="fs-7 text-decoration-none text-white-50">A propos de nous</a></li>
                </ul>
              </div>
           </div>
           <!-- END  THE COLUMN -->
          <div class="col">
           <div class="footer-col">
                <h4 class="mb-3">Besoin d'aide </h4>
                <ul class=" list-unstyled">
                  <li ><a href="#" class=" text-decoration-none text-white-50">FAQ</a></li>
                  <li><a href="#"class=" text-decoration-none text-white-50">Privacy Policy</a></li>
                  <li><a href="#"class="text-decoration-none text-white-50">Commande</a></li>
                  <li><a href="#"class="text-decoration-none text-white-50">Option de paiement</a></li>
                </ul>
              </div>
          
           </div>
           <!-- END  THE COLUMN -->
         <div class="col">
           <div class="footer-col">
                <h4 class="mb-3">Nos activité en ligne</h4>
                <ul class="fs-6 list-unstyled">
                  <li ><a href="#" class=" text-decoration-none text-white-50">Vente</a></li>
                  <li><a href="#"class=" text-decoration-none text-white-50">Location</a></li>
                  <li><a href="#"class="text-decoration-none text-white-50">Parking</a></li>
                  <li><a href="#"class=" text-decoration-none text-white-50">Exportation</a></li>
                </ul>
              </div>
           </div> 
           <!-- END  THE COLUMN -->
           <div class="col">
              <div class="footer-col">
                <h4 class="mb-3">Follow us</h4>
                <div class="social-icons">
                  <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="text-light me-2"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="text-light me-2"><i class="bi bi-instagram"></i></a>
               </div>
              </div>
           </div> 
           
           <!-- END OF ALL THE COLUMN -->
      </div> 
     </div> 
    </footer> 


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   
  </body>
</html>
