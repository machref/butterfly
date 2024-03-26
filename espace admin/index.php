<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Boostrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">
      <!-- Css link -->
      <link rel="stylesheet" href="./style.css">
      <!--Font awesom link !-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous"
   referrerpolicy="no-referrer" />
  </head>
</head>
<body>
    <!--Navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar">
            <div class="logo">
                <img src="../image/433584373_428372606436951_9024237364785455080_n-removebg-preview.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="" class=""><p style="color:#007bff;">Welcome Guest</p></a>
                </li>
                <li>
               <a href="#">Logout<i class="fa-solid fa-right-from-bracket"></i></a>
                </li>
            </ul>
        </nav>
        <!-- second child-->
        <div class="secondchild"><h3 class="text-center p-2">Manage Details</h3></div>
        <!-- third child -->
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-section">
                <div class="admin-info">
                    <a href="#">
                        <img src="../Blue Minimalist Ramadan Kareem Instagram Post (1).png" alt="" class="adminimg">
                    </a>
                    <p class="text-center">Admin name</p>
                </div>
                <div class="admin-links">
                    <button><a href="insert_product.php" class="nav-link">Insert Product</a></button>
                    <button><a href="#" class="nav-link">View Product</a></button>
                    <button><a href="index.php?insert_categorie=true" class="nav-link">Insert Categories</a></button>
                    <button><a href="#" class="nav-link">View Categories</a></button>
                    <button><a href="#" class="nav-link">All Orders</a></button>
                    <button><a href="#" class="nav-link">All Payment</a></button>
                    <button><a href="#" class="nav-link">List Users</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
    if (isset($_GET['insert_categorie']) && $_GET['insert_categorie'] === 'true') {
        include('insert_categorie.php');
    }
    ?>




<footer style="text-align: center;"><p>All rights reserved © Designed by Mejri Achref -2024</p></footer>
<!--boostrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

</body>
</html>
