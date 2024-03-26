<!-- Connect file -->
<?php
include('../include/connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST['insert_product'])){
    $product_name = $_POST['nom_produit'];
    $product_description = $_POST['description'];
    $product_keyword = $_POST['productkeyword'];
    $product_categorie = $_POST['categorie'];
    $product_prix = $_POST['prix'];
    $status = 'true';

    // image name
    $product_image1 = $_FILES['imageproduit1']['name'];
    $product_image2 = $_FILES['imageproduit2']['name'];
    $product_image3 = $_FILES['imageproduit3']['name'];
   
    // image name tmp
    $temp_image1 = $_FILES['imageproduit1']['tmp_name'];
    $temp_image2 = $_FILES['imageproduit2']['tmp_name'];
    $temp_image3 = $_FILES['imageproduit3']['tmp_name'];

    // Vérifier si l'un des champs est vide
    if (empty($product_name) || empty($product_description) || empty($product_keyword)
    || empty($product_categorie) || empty($product_prix) || empty($product_image1)
|| empty($product_image2) || empty($product_image3)) {
        echo "<script>alert('Veuillez remplir tous les champs.')</script>";
        exit();
    } else {
        // Déplacer les fichiers téléchargés vers le répertoire approprié
        move_uploaded_file($temp_image1, "image_prod/$product_image1");
        move_uploaded_file($temp_image2, "image_prod/$product_image2");
        move_uploaded_file($temp_image3, "image_prod/$product_image3");

        // Insérer les produits dans la base de données
        $insert = "INSERT INTO `produit` (nom_produit, description_produit, keyword_produit,
        categorie_produit, image_produit1, image_produit2, image_produit3, prix_produit,date,status)
        VALUES ('$product_name', '$product_description', '$product_keyword',
        '$product_categorie', '$product_image1', '$product_image2',
         '$product_image3', '$product_prix', NOW(), '$status')";
        

        // Exécuter la requête d'insertion
        $result_query = mysqli_query($conn, $insert);
        if($result_query) {
            echo "<script>alert('Produit ajouté avec succès.')</script>";
        } else {
            echo "<script>alert('Erreur lors de l'ajout du produit.')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- Bootsrap link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH
     " crossorigin="anonymous">
     
<!--Font awesom link !-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous"
   referrerpolicy="no-referrer" />
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
            font-size: 90;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Insert Product</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Nom Produit -->
            <label for="nom_produit">Nom du produit :</label>
            <input type="text" id="nom_produit" name="nom_produit" class="form-control"
       placeholder="Entrer le nom de produit"
       autocomplete="off" required>


            <!-- Description -->
            <label for="description">Description du produit :</label>
            <input type="text" id="description" name="description" placeholder="Entrer la description du produit"
            autocomplete="off" required>

            <!-- Keyword du produit -->
            <label for="productkeyword">Keyword du produit :</label>
            <input type="text" id="productkeyword" name="productkeyword" placeholder="Entrer le keyword du produit"
            autocomplete="off" required>

            <!-- Catégorie -->
            <label for="categorie">Catégorie :</label>
            <select name="categorie" id="categorie" required>
                <option value="">Choisir une catégorie</option>

                <?php
            $select_cat="SELECT * FROM `categorie`";
            $result_cat=mysqli_query($conn,$select_cat);
            while($row_data = mysqli_fetch_assoc($result_cat)) {
                $cat_id=$row_data['categorie_id'];
                $cat_title = $row_data['categorie_title'];
                echo"<option value='$cat_id'>$cat_title</option>";
            }
            ?>
            </select>

            <!-- Image Produit 1 -->
            <label for="imageproduit1">Image du produit 1 :</label>
            <input type="file" id="imageproduit1" name="imageproduit1" required>

            <!-- Image Produit 2 -->
            <label for="imageproduit2">Image du produit 2 :</label>
            <input type="file" id="imageproduit2" name="imageproduit2">

            <!-- Image Produit 3 -->
            <label for="imageproduit3">Image du produit 3 :</label>
            <input type="file" id="imageproduit3" name="imageproduit3">

            <!-- Prix du produit -->
            <label for="prix">Prix du produit :</label>
            <input type="text" id="prix" name="prix"
            placeholder="Entrer le prix du produit"  autocomplete="off" required>

            <!-- Bouton d'envoi -->
            <input type="submit" name="insert_product" value="Ajouter le produit">
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>
</body>
</html>
