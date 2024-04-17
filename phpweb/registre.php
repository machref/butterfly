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
                            <a class="nav-link" href="../display_allprod.php">Produit</a>
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
    <?php
    if(isset($_GET['sauvegarder'])) {
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
    

    
</div>
</div>
<form action="registre.php" method="POST">
<div class="col-12 p-5">
    <h1 class="text-center"> Register </h1> 
    <div class="row">
       

<form action="" method="POST" enctype="multipart/form-data">       
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">login</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="user_email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="user_username" class="form-label">username </label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="user_username">
  </div>
  <div class="mb-3">
    <label for="telephone" class="form-label">Mobile </label>
    <input type="text" class="form-control" id="telephone" name="user_mobile">
  </div>
  <div class="mb-3">
    <label for="user_address" class="form-label">Adress</label>
    <input type="text" class="form-control" id="telephone" name="user_address">
  </div>
  <div class="mb-3">
    <label for="user_image" class="form-label"> user image </label>
    <input type="file" class="form-control" id="user_image"
    required="required" name="user_image">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label"> choose password </label>
    <input type="password" class="form-control" id="password" name="user_password">
  </div> 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> confirm password </label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="conf_user_password">
  </div>
  <input type="submit" value="register" class="bg-info py-2 px-3 border-0 " name="user_register"></input>
  <p class="fw-bold mt-2 pt-1"> Already have an account?<a href="connexion.php" class="text-danger"> login </a> </p>
</form>
</form>
</div>

<!-- last child -->
<footer><p></p></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>


</body>
</html>

<?php
if(isset($_POST['user_register'])) {
$user_email=$_POST['user_email'];
$user_username=$_POST['user_username'];
$user_mobile=$_POST['user_mobile'];
$user_address=$_POST['user_address'];
$user_image=$_FILES['user_image']['name'];
$user_image_tmp=$_FILES['user_image']['tmp_name'];
$user_password=$_POST['user_password'];
$hash_password=password_hash($user_password,$password_default);
$conf_user_password=$_POST['conf_user_password'];
$user_ip=getIpAddress();
//select query
$select_query = "SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
$result = mysqli_query($con, $select_query);
$rows_count = mysqli_num_rows($result);
if ($rows_count > 0) {
    echo "<script>alert('Username or email already exists')</script>";
} elseif ($user_password != $conf_user_password) {
    echo "<script>alert('Passwords do not match')</script>";
}
// Vérification du téléchargement du fichier
if (move_uploaded_file($user_image_tmp, "./users_images/$user_image")) {
    // insert_query
    $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_address, user_image, user_mobile, user_ip) 
                    VALUES ('$user_username', '$user_email', '$hash_password', '$user_address', '$user_image', '$user_mobile', '$user_ip')";
    $sql_execute = mysqli_query($con, $insert_query);
    if ($sql_execute) {
        echo "<script>alert('User registered successfully')</script>";
    } else {
        echo "<script>alert('Error: Unable to register user')</script>";
    }
} else {
    echo "<script>alert('Error: Failed to upload image')</script>";
}
}
?>
