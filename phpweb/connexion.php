<?php

use LDAP\Result;

include('../include/connect.php');
include('../functions/common_function.php');
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
                            <a class="nav-link active" aria-current="page" href="..\index.php">Accueil</a>
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
                            <a class="nav-link" href="#">
                                <i class="fas fa-shopping-cart"></i><sup style="color: red;">1</sup>
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>
    <div class="container py-2">
    <?php
    if(isset($_GET['connecter'])) {
        $login=$_GET['login'];
        $password=$_GET['password'];
        if(!empty($login) && !empty($password)){
            echo" Bienvenue $login";
       } else{
        ?>
        <div class="alert alert-danger" role="alert">
     Tapez votre login et password !
    </div>
    <?php
       }
    }
    ?>
    

    

<div class="col-12 p-5">
    <h1 class="text-center"> LOGIN </h1>
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">login</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your login with anyone else.</div>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> password </label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary"> login </button>
  <p class="fw-bold mt-2 pt-1"> Don't have an account? <a href="registre.php" class="text-danger"> Register </a> </p>
</form>
</div>

<!-- last child -->
<footer></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
</body>
</html>