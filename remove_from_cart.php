<?php
// Inclure votre fichier de connexion à la base de données
include('../Buttefrly/include/connect.php');
include('../Buttefrly/functions/common_function.php');

// Vérifier si l'identifiant du produit à supprimer a été envoyé via la méthode POST
if(isset($_POST['product_id'])) {
    // Récupérer l'identifiant du produit depuis les données POST
    $product_id = $_POST['product_id'];

    // Récupérer l'adresse IP de l'utilisateur
    $ip = getIpAddress();

    // Construire la requête SQL pour supprimer le produit du panier
    $delete_query = "DELETE FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $product_id";

    // Exécuter la requête SQL
    $result = mysqli_query($conn, $delete_query);

    // Vérifier si la suppression a réussi
    if($result) {
        // La suppression a réussi, renvoyer un code de statut HTTP 200
        http_response_code(200);
        // Vous pouvez également envoyer des données JSON si nécessaire
        // echo json_encode(['message' => 'Product removed from cart successfully']);
    } else {
        // La suppression a échoué, renvoyer un code de statut HTTP 500 (erreur interne du serveur)
        http_response_code(500);
        // Vous pouvez également envoyer des données JSON si nécessaire
        // echo json_encode(['message' => 'Failed to remove product from cart']);
    }
} else {
    // Si l'identifiant du produit n'a pas été envoyé via POST, renvoyer un code de statut HTTP 400 (mauvvaise requête)
    http_response_code(400);
    // Vous pouvez également envoyer des données JSON si nécessaire
    // echo json_encode(['message' => 'Product ID not provided']);
}
?>
