<?php

use LDAP\Result;

include('../Buttefrly/include/connect.php');
include ('../Buttefrly/functions/common_function.php');
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

     <link rel="stylesheet" href="cart_details.css">
           <script src="panier.js" defer></script>

    
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


<div class="cart-container">
    <h2>Votre Panier</h2>
    <div class="cart-items">
    <?php
$total_cart_price = 0; // Initialisation de la variable
    $select = "SELECT *
               FROM `cart_details`
               INNER JOIN `produit` ON cart_details.product_id = produit.id_produit";
    $result_query = mysqli_query($conn, $select);

    while ($row = mysqli_fetch_assoc($result_query)) {
        // Maintenant, vous pouvez accéder aux détails du produit ainsi qu'aux détails du panier
        $product_id = $row['product_id'];
        $product_name = $row['nom_produit'];
        $product_price = $row['prix_produit'];
        $product_image = $row['image_produit1'];
        // Autres détails du panier
        $quantity = $row['quantity'];
        $product_total_price = $product_price * $quantity;
        $total_cart_price += $product_total_price;
?>
        <div class="cart-item" id="cart-item-<?php echo $product_id; ?>">
            <img src="<?php echo 'espace admin/image_prod/' . $product_image; ?>"
            alt="<?php echo $product_name; ?>" class="cart-item-image">
            <div class="cart-item-details">
                <h3 class="cart-item-name"><?php echo $product_name; ?></h3>
                <p class="cart-item-price"><?php echo $product_price; ?> €</p>
                <div class="cart-item-quantity">
            <label for="quantity_<?php echo $product_id; ?>">Quantité:</label>
            <input type="number" id="quantity_<?php echo $product_id; ?>" name="quantity_<?php echo $product_id; ?>
            " value="<?php echo $quantity; ?>" min="1" onchange="updateCartItemQuantity(<?php echo $product_id; ?>)">
        </div>
                <button class="remove-from-cart-btn" data-product-id="<?php echo $product_id; ?>"
                onclick="removeFromCart(<?php echo $product_id; ?>)">Supprimer</button>
            </div>
        </div>
<?php
    }

?>


    </div>
    <div class="cart-total">
        <!-- Ici, vous pouvez afficher le total du panier -->
        <h3>Total: <span id="cart-total"><?php echo number_format($total_cart_price, 2); ?></span> €</h3>
    </div>
    <div class="cart-actions">
    <button class="checkout-btn"> <a href='checkout.php'> Passer la commande </a> </button>
        <button class="clear-cart-btn">Vider le panier</button>
    </div>
</div>
</body>
</html>
