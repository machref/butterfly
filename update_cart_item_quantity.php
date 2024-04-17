<?php
// Inclure votre fichier de connexion à la base de données
include('../Buttefrly/include/connect.php');

// Vérifier si l'identifiant du produit et la nouvelle quantité ont été envoyés
if (isset($_POST['product_id'], $_POST['quantity'])) {
    // Récupérer l'identifiant du produit et la nouvelle quantité depuis la requête POST
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['quantity'];

    // Mettre à jour la quantité du produit dans la table cart_details
    $update_query = "UPDATE cart_details SET quantity = $new_quantity WHERE product_id = $product_id";
    $result = mysqli_query($conn, $update_query);

    if ($result) {
        // La mise à jour de la quantité a réussi
        echo "La quantité du produit a été mise à jour avec succès.";
    } else {
        // La mise à jour de la quantité a échoué
        echo "Erreur lors de la mise à jour de la quantité du produit.";
    }
} else {
    // Les données nécessaires n'ont pas été envoyées
    echo "Erreur : Identifiant du produit ou nouvelle quantité manquante.";
}
?>
