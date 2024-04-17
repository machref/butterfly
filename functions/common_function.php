<?php
//including connection

//include('./include/connect.php');


// Display products for a specific category
function get_unique_categorie(){
  global $conn;
  if(isset($_GET['categorie'])){
      $categorie_id = $_GET['categorie'];
      $select = "SELECT * FROM `produit` WHERE categorie_produit = $categorie_id";
      $result_query = mysqli_query($conn, $select);
      $numrows=mysqli_num_rows($result_query);
      if($numrows==0){
        echo "<h2 class='text-center'>Pour le moment on n'a pas des produits</h2>";
      }

      while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['id_produit'];
          $product_description = $row['description_produit'];
          $product_title = $row['nom_produit'];
          $product_price = $row['prix_produit'];
          $product_image1 = $row['image_produit1'];
          $categorie_id = $row['categorie_produit'];
          
          // Display product HTML
          echo "<div class='col-md-4 mb-2'>
                  <div class='card'>
                    <img src='espace admin/image_prod/$product_image1' class='card-img-top'
                      alt='$product_title' style='height: 200px;'>
                    <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <div class='price' style='
                        font-size: 18px;
                        font-weight: bold;
                        color: #ff0000; /* Couleur rouge */
                        margin-bottom: 10px; /* Espacement en bas */
                      '>$product_price TND</div>
                      <a href='display_allprod.php?add_to_cart=$product_id' class='btn btn-info' style='
                        background-color: #4CAF50; /* Couleur de fond verte */
                        border: none;
                        color: white; /* Couleur du texte blanc */
                        padding: 10px 20px; /* Espacement interne */
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        transition-duration: 0.4s;
                        cursor: pointer;
                        border-radius: 5px; /* Coins arrondis */
                      '> <i class='fa-solid fa-cart-shopping'></i> J'achète</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-secondary' style='
                        background-color: #ff6600; /* Couleur de fond orange */
                        border: none;
                        color: white; /* Couleur du texte blanc */
                        padding: 10px 20px; /* Espacement interne */
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        transition-duration: 0.4s;
                        cursor: pointer;
                        border-radius: 5px; /* Coins arrondis */
                      '>Voir plus</a>
                    </div>
                  </div>
                </div>";
      }
      
  }
}

// Display random products if no category is chosen
function getproducts(){
  global $conn;
  $select = "SELECT * FROM `produit` ORDER BY RAND() LIMIT 9";
  $result_query = mysqli_query($conn, $select);
  
  while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['id_produit'];
    $product_description = $row['description_produit'];
    $product_title = $row['nom_produit'];
    $product_price = $row['prix_produit'];
    $product_image1 = $row['image_produit1'];
    $categorie_id = $row['categorie_produit'];
    
    // Display product HTML
    echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='espace admin/image_prod/$product_image1' class='card-img-top'
                alt='$product_title' style='height: 200px;'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <div class='price' style='
                  font-size: 18px;
                  font-weight: bold;
                  color: #ff0000; /* Couleur rouge */
                  margin-bottom: 10px; /* Espacement en bas */
                '>$product_price TND</div>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info' style='
                  background-color: #4CAF50; /* Couleur de fond verte */
                  border: none;
                  color: white; /* Couleur du texte blanc */
                  padding: 10px 20px; /* Espacement interne */
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  transition-duration: 0.4s;
                  cursor: pointer;
                  border-radius: 5px; /* Coins arrondis */
                '> <i class='fa-solid fa-cart-shopping'></i> J'achète</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary' style='
                  background-color: #ff6600; /* Couleur de fond orange */
                  border: none;
                  color: white; /* Couleur du texte blanc */
                  padding: 10px 20px; /* Espacement interne */
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  transition-duration: 0.4s;
                  cursor: pointer;
                  border-radius: 5px; /* Coins arrondis */
                '>Voir plus</a>
              </div>
            </div>
          </div>";
}

}

function getcategorie(){
  global $conn;
  $select_cat = "SELECT * FROM `categorie`";
        $result_cat = mysqli_query($conn, $select_cat);

        while($row_data = mysqli_fetch_assoc($result_cat)) {
            $cat_id=$row_data['categorie_id'];
            $cat_title = $row_data['categorie_title'];
            echo "<li class='nav-item'>
                    <a href='display_allprod.php?categorie=$cat_id' class='nav-link text-dark' style='font-size: 16px;'>$cat_title</a>
                  </li>";
        }
}
// getting search product
function product_recherche(){
  global $conn;
  if(isset($_GET['rechercher'])){
      $value= $_GET['rechercher'];
      $recherche_query = "SELECT * FROM `produit` WHERE keyword_produit LIKE '%$value%' ";
      $result_query = mysqli_query($conn, $recherche_query);
      $numrows = mysqli_num_rows($result_query);
      if($numrows == 0){
          echo "<h4 class='text-center'>Aucun résultat trouvé pour la recherche : $value</h4>";
      }
      
      while($row = mysqli_fetch_assoc($result_query)){
        $product_id = $row['id_produit'];
        $product_description = $row['description_produit'];
        $product_title = $row['nom_produit'];
        $product_price = $row['prix_produit'];
        $product_image1 = $row['image_produit1'];
        $categorie_id = $row['categorie_produit'];
        
        // Display product HTML
        echo "<div class='col-md-4 mb-2'>
                <div class='card'>
                  <img src='espace admin/image_prod/$product_image1' class='card-img-top'
                    alt='$product_title' style='height: 200px;'>
                  <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <div class='price' style='
                      font-size: 18px;
                      font-weight: bold;
                      color: #ff0000; /* Couleur rouge */
                      margin-bottom: 10px; /* Espacement en bas */
                    '>$product_price TND</div>
                    <p class='card-text'>$product_description</p>
                    <a href='display_allprod.php?add_to_cart=$product_id' class='btn btn-info' style='
                      background-color: #4CAF50; /* Couleur de fond verte */
                      border: none;
                      color: white; /* Couleur du texte blanc */
                      padding: 10px 20px; /* Espacement interne */
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                      transition-duration: 0.4s;
                      cursor: pointer;
                      border-radius: 5px; /* Coins arrondis */
                    '> <i class='fa-solid fa-cart-shopping'></i> J'achète</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary' style='
                      background-color: #ff6600; /* Couleur de fond orange */
                      border: none;
                      color: white; /* Couleur du texte blanc */
                      padding: 10px 20px; /* Espacement interne */
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                      transition-duration: 0.4s;
                      cursor: pointer;
                      border-radius: 5px; /* Coins arrondis */
                    '>Voir plus</a>
                  </div>
                </div>
              </div>";
    }
    
    
  }
}

function displayProductsPerPage($conn, $limit = 6) {
  // Calculate total number of products
  $total_products_query = "SELECT COUNT(*) as total FROM `produit`";
  $total_products_result = mysqli_query($conn, $total_products_query);
  $total_products_row = mysqli_fetch_assoc($total_products_result);
  $total_products = $total_products_row['total'];

  // Calculate current page number
  $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

  // Calculate starting index for products
  $start_index = ($current_page - 1) * $limit;

  // Fetch products for the current page
  $select_products_query = "SELECT * FROM `produit` LIMIT $start_index, $limit";
  $products_result = mysqli_query($conn, $select_products_query);

  // Display products
  while ($row = mysqli_fetch_assoc($products_result)) {
    // Extract product details
    $product_id = $row['id_produit'];
    $product_title = $row['nom_produit'];
    $product_description = $row['description_produit'];
    $product_image1 = $row['image_produit1'];
    $product_price = $row['prix_produit']; // Adding product price

    // Display product HTML
    echo "<div class='col-md-4 mb-4'>
            <div class='card h-100'>
              <img src='espace admin/image_prod/$product_image1' class='card-img-top'
                alt='$product_title' style='height: 300px; object-fit: cover;'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <div class='d-flex justify-content-between align-items-center'>
                <span style='color: #ff0000; font-style: italic; font-weight: bold; font-size: 20px;'>$product_price TND</span>
                  <div>
                    <a href='display_allprod.php?add_to_cart=$product_id' class='btn btn-success'> <i class='fa-solid fa-cart-shopping'></i> J'achète</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>Voir plus</a>
                  </div>
                </div>
              </div>
            </div>
          </div>";
}



  // Generate navigation links
  $total_pages = ceil($total_products / $limit);

  echo "<div class='pagination' style='margin-top: 20px; display: flex; justify-content: center;'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $active_class = ($i == $current_page) ? 'active' : '';
    echo "<a href='display_allprod.php?page=$i' class='btn btn-outline-custom $active_class mx-1'>$i</a>";
}
echo "</div>";

}
function getIpAddress() {
  // Check for shared internet/ISP IP
  if (!empty($_SERVER['HTTP_CLIENT_IP']) && validateIpAddress($_SERVER['HTTP_CLIENT_IP'])) {
      return $_SERVER['HTTP_CLIENT_IP'];
  }

  // Check for IP addresses passing through proxies
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      // Check if multiple IP addresses are provided and take the last one
      $ipAddresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
      foreach ($ipAddresses as $ip) {
          if (validateIpAddress($ip)) {
              return $ip;
          }
      }
  }

  // Check for the remote IP address
  if (!empty($_SERVER['REMOTE_ADDR']) && validateIpAddress($_SERVER['REMOTE_ADDR'])) {
      return $_SERVER['REMOTE_ADDR'];
  }

  // Return a default IP if none of the above methods are successful
  return 'UNKNOWN';
}

// Function to validate an IP address
function validateIpAddress($ip) {
  if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
      return true;
  }
  return false;
}

// Usage
// $ipAddress = getIpAddress();
// echo "Your IP address is: $ipAddress";

// cart function
function cart(){
  global $conn;
  $ip= getIpAddress();
  if(isset($_GET['add_to_cart'])){
    global $conn;
  $ip= getIpAddress();
  $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM `cart_details` WHERE ip_address='$ip' and product_id=$get_product_id";
    $result_query=mysqli_query($conn,$select_query);
    $numrows = mysqli_num_rows($result_query);
      if($numrows > 0){
          echo "<script>alert('This item is already in cart')</script>";
      }else{
        $insert_query="INSERT INTO `cart_details`(product_id,ip_address,quantity)
        VALUES ($get_product_id,'$ip',0)";
        $result_query=mysqli_query($conn,$insert_query);
        echo"<script>window.open('index.php','_self')</script>";
      }
  }
}
// total cart price
function total_price(){
  global $conn;
  $ip = getIpAddress();
        $total_cart_price = 0;
        $select = "SELECT *
                   FROM `cart_details` WHERE ip_address='$ip'
                   INNER JOIN `produit` ON cart_details.product_id = produit.id_produit";
        $result_query = mysqli_query($conn, $select);

        while($row = mysqli_fetch_assoc($result_query)){
           $product_price = $row['prix_produit'];
            $quantity = $row['quantity'];
            $product_total_price = $product_price * $quantity;
            $total_cart_price += $product_total_price;
        }
        echo $total_cart_price;

}
//total product nummber
function cart_product_number(){
  global $conn;

  $ip = getIpAddress();

  if(isset($_GET['add_to_cart'])){
      $select = "SELECT *
                 FROM `cart_details` WHERE ip_address='$ip'";
      $result_query = mysqli_query($conn, $select);
      $count_cart_items = mysqli_num_rows($result_query);
  } else {
      $select = "SELECT *
                 FROM `cart_details` WHERE ip_address='$ip'";
      $result_query = mysqli_query($conn, $select);
      $count_cart_items = mysqli_num_rows($result_query);
  }
  
  echo $count_cart_items;
}



?>
