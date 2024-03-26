<!-- Connect file -->
<?php
include('../Buttefrly/include/connect.php');
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
     <link rel="stylesheet" href="style.css">

    
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
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="#">Produit</a>
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

    <div class="welcome-section" style="background-image: url(welcome.png);">
        <h1>Bienvenue chez Butterfly</h1>
        <p>Découvrez notre sélection de fleurs fraîches et de bouquets uniques pour toutes les occasions.</p>
        <a href="#" class="btn btn-primary">Shop now</a>
    </div>
    <div class="prodrech">
    <h3>Produit</h3>
    <p style="text-align: center;">Communications is at the heart of e-commerce and cummunity</p>
    <div class="container mx-auto text-center">
    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                        <button class="btn btn-outline-light" type="submit"
                         style="color: #007bff; border-color: #007bff;">Rechercher</button>
                    </form>
</div>
</div>
<div class="row">
  <div class=" col-md-10">
<!-- Products -->
<div class="row">
  <div class="col-md-4 mb-2">
    <div class="card">
      <img src="./image/image1.jpeg" class="card-img-top" alt="Product 1" style="height: 200px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build
           on the card title and make up
            the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to card</a>
        <a href="#" class="btn btn-secondary">View more</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card">
      <img src="./image/R.jpeg" class="card-img-top" alt="Product 2" style="height: 200px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build
           on the card title and make up
            the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to card</a>
        <a href="#" class="btn btn-secondary">View more</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card">
      <img src="./image/image2.jpeg" class="card-img-top" alt="Product 3" style="height: 200px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build
           on the card title and make up
            the bulk of the card's content.</p>
            <a href="#" class="btn btn-info">Add to card</a>
        <a href="#" class="btn btn-secondary">View more</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 mb-2">
    <div class="card">
      <img src="./image/image1.jpeg" class="card-img-top" alt="Product 1" style="height: 200px;">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build
          on the card title and make up
          the bulk of the card's content.</p>
        <a href="#" class="btn btn-info">Add to card</a>
        <a href="#" class="btn btn-secondary">View more</a>
      </div>
    </div>
  </div>
</div>


</div>
  <div class=" col-md-2">
    <!-- Sidenav -->
    <ul class="navbar-nav me-auto text-center">
    <li class="nav-item">
        <a href="" class="nav-link text-light"><h3>Catégories</h3></a>
    </li>
    <?php
    $select_cat = "SELECT * FROM `categorie`";
    $result_cat = mysqli_query($conn, $select_cat);

    while($row_data = mysqli_fetch_assoc($result_cat)) {
        $cat_id=$row_data['categorie_id'];
        $cat_title = $row_data['categorie_title'];
        echo "<li class='nav-item'>
                  <a href='index.php?categorie=$cat_id' class='nav-link text-light'>$cat_title</a>
              </li>";
    }

?>
</ul>

</ul>
    </ul>
  </div>
</div>

    


<!-- last child -->
<footer><p>All rights reserved © Designed by Mejri Achref -2024</p></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
</body>
</html>
