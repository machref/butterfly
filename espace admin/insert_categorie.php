<?php
include('../include/connect.php');

if(isset($_POST['insert_cat'])){
  $cat_title = $_POST['cat_title'];
  if(empty($cat_title)) {
    echo "<script>alert('Le champ de catégorie est vide')</script>";
  } else { // Added opening brace here
    $select_query = "SELECT * FROM `categorie` WHERE categorie_title='$cat_title'";
    $result_select = mysqli_query($conn, $select_query);
    $count = mysqli_num_rows($result_select);
    if($count > 0){
      echo "<script>alert('Categorie existe déjà')</script>";
    }
    else{
      $insert_query = "INSERT INTO `categorie` (categorie_title) VALUES ('$cat_title')";
      $result = mysqli_query($conn, $insert_query);
      if($result){
        echo "<script>alert('Categorie a été ajoutée avec succès')</script>";
      }
    }
  }
}
?>
<div class="container my-4">
<h3 class="text-center">Insert Categorie</h3>
<form action="" method="post" class="mb-2">
  <div class="input-group mb-2 w-90">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control"
     name="cat_title" placeholder="Insert categories"
     aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="input-group mb-2 w-10 m-auto">
    <input type="submit" class="form-control" name="insert_cat" value="Insert Categories">
  </div>
</form>
</div>
