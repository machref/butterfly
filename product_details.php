<!-- Connect file -->
<?php

use LDAP\Result;

include('../Buttefrly/include/connect.php');
include('../Buttefrly/functions/common_function.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butterfly</title>
    <!-- Bootsrap link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH
     " crossorigin="anonymous">
     <link rel="stylesheet" href="style1.css">
     <link rel="stylesheet" href="product_details.css">

 

    
<!--Font awesom link !-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous"
   referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="product_details.css">
</head>

<body>
   <!-- Navbar -->
   <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa;">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <img src="./image/433584373_428372606436951_9024237364785455080_n-removebg-preview.png"
                 alt="" class="logo">
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="display_allprod.php">Produit</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> Please Sign Up
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart_details.php">
                                <i class="fas fa-shopping-cart"></i><sup style="color: red;"><?php cart_product_number(); ?></sup>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="connexion.php"> Login </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>
</div>
</div>
<?php
    cart();
    ?>
<?php
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $select_query = "SELECT * FROM `produit` WHERE id_produit = $product_id";
    $result_query = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result_query);
}
?>
<div class="container py-5">
    <div class="row">
        <!-- Carrousel d'images -->
        <div class="col-md-6">
            <div id="product-carousel" class="carousel slide mt-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="espace admin/image_prod/<?php echo $row['image_produit1']; ?>" class="d-block w-100" alt="<?php echo $row['nom_produit']; ?>">
                    </div>
                    <div class="carousel-item">
                        <img src="espace admin/image_prod/<?php echo $row['image_produit2']; ?>" class="d-block w-100" alt="<?php echo $row['nom_produit']; ?>">
                    </div>
                    <div class="carousel-item">
                        <img src="espace admin/image_prod/<?php echo $row['image_produit3']; ?>" class="d-block w-100" alt="<?php echo $row['nom_produit']; ?>">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#product-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#product-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Détails du produit -->
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <!-- Titre -->
                <h2 class="mb-4 product-title"><?php echo $row['nom_produit']; ?></h2>
                
                <!-- Prix -->
                <p class="mb-3 product-price"> $<?php echo $row['prix_produit']; ?></p>
                
                <!-- Description -->
                <p class="lead product-description"><?php echo $row['description_produit']; ?></p>
                
                <!-- Phrase d'attraction -->
                <p class="mb-4 product-attraction">Ajoutez une touche de fraîcheur à votre journée avec notre magnifique bouquet de fleurs. Commandez dès maintenant!</p>
                
                <!-- Bouton pour ajouter au panier -->
                <form action="ajouter_panier.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $row['id_produit']; ?>">
                    <button type="submit" class="btn btn-primary btn-lg">Ajouter au Panier</button>
                </form>
                <div style="margin-top: 10px;"></div>

                <p class="mb-0" style="font-size: 14px; color: #007bff; font-weight: bold;"><i class="fas fa-check-circle"></i> Sur commande</p>

            </div>
        </div>
    </div>
</div>








<!-- last child -->
<footer><p>All rights reserved © Designed by Mejri Achref -2024</p></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
</body>
</html>