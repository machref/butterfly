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
    <link rel="stylesheet" href="paginationstyle.css">


    
<!--Font awesom link !-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous"
   referrerpolicy="no-referrer" />
  

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
                            <a class="nav-link" href="../Buttefrly/display_produit/produits.php">Produit</a>
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
                            <a class="nav-link" href="#">
                                <i class="fas fa-shopping-cart"></i><sup style="color: red;">1</sup>
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>

   
    <div class="prodrech">
    <h3>Produit</h3>
    <p>Communications is at the heart of e-commerce and cummunity</p>
    <div class="container mx-auto text-center">
        <form class="d-flex form" role="search" method="get" action="recherche_produit.php">
            <input class="form-control me-2" type="rechercher" placeholder="Rechercher" aria-label="Rechercher" name="rechercher">
            <input class="btnsubmit" type="submit" value="Rechercher" name="recherche_data_prod"></input>
        </form>
    </div>
</div>
</div>
<div class="row px-3">
  <div class="col-md-2">
    <!-- Sidenav -->
    <ul class="navbar-nav me-auto text-center" style="background-color: #f8f9fa; padding: 10px; border-radius: 10px;">
        <li class="nav-item">
            <a href="#" class="nav-link text-dark"><h4 style="color: #ff6600; font-weight: bold;">Catégories</h4></a>
        </li>
        <?php
        getcategorie();
        ?>
    </ul>
</div>

  
  <div class="col-md-10">
    <!-- Products -->
    <div class="row">
      <?php
      if(isset($_GET['categorie'])){
        get_unique_categorie();
    } else {
        displayProductsPerPage($conn);
    }
      ?>
     
    </div>
  </div>
</div>


    


<!-- last child -->
<footer><p>All rights reserved © Designed by Mejri Achref -2024</p></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
</body>
</html>
