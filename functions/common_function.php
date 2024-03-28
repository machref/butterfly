<?php
//including connection

include('./include/connect.php');


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
                      <p class='card-text'>$product_description</p>
                      <a href='#' class='btn btn-info' style='
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
                      <a href='#' class='btn btn-secondary' style='
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
                  <p class='card-text'>$product_description</p>
                  <a href='#' class='btn btn-info' style='
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
                  <a href='#' class='btn btn-secondary' style='
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
                    <a href='index.php?categorie=$cat_id' class='nav-link text-dark' style='font-size: 16px;'>$cat_title</a>
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
                      <p class='card-text'>$product_description</p>
                      <a href='#' class='btn btn-info' style='
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
                      <a href='#' class='btn btn-secondary' style='
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
// display product per page
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
    $product_title = $row['nom_produit'];
    $product_description = $row['description_produit'];
    $product_image1 = $row['image_produit1'];
      // Display each product
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='espace admin/image_prod/$product_image1' class='card-img-top'
        alt='$product_title' style='height: 200px;'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <a href='#' class='btn btn-info' style='
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
          <a href='#' class='btn btn-secondary' style='
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

  // Generate navigation links
  $total_pages = ceil($total_products / $limit);

  echo "<div class='pagination' style='margin-top: 20px; display: flex; justify-content: center;'>";
for ($i = 1; $i <= $total_pages; $i++) {
    $active_class = ($i == $current_page) ? 'active' : '';
    echo "<a href='display_allprod.php?page=$i' class='btn btn-outline-custom $active_class mx-1'>$i</a>";
}
echo "</div>";



}



?>
