// Ajouter un gestionnaire d'événements clic à chaque bouton de suppression
document.querySelectorAll('.remove-from-cart-btn').forEach(button => {
    button.addEventListener('click', function() {
        // Récupérer l'identifiant du produit à supprimer
        const productId = this.dataset.productId;

        // Supprimer l'élément du panier du DOM
        const cartItem = document.getElementById('cart-item-' + productId);
        cartItem.remove();

        // Mettre à jour le total du panier
        updateCartTotal();

        // Vous pouvez également envoyer une requête AJAX pour supprimer le produit du panier côté serveur
        // et mettre à jour la base de données en conséquence
    });
});

// Fonction pour mettre à jour le total du panier
function updateCartTotal() {
    // Récupérer tous les prix des produits dans le panier
    const cartPrices = Array.from(document.querySelectorAll('.cart-item-price')).map(price => parseFloat(price.textContent.replace(' €', '')));

    // Calculer le total du panier en additionnant tous les prix des produits
    const cartTotal = cartPrices.reduce((total, price) => total + price, 0);

    // Mettre à jour l'affichage du total du panier
    document.getElementById('cart-total').textContent = cartTotal.toFixed(2);
}
// Fonction JavaScript pour envoyer une requête AJAX pour supprimer l'article du panier

function removeFromCart(productId) {
// Envoyer une requête AJAX
const xhr = new XMLHttpRequest();
xhr.open('POST', 'remove_from_cart.php'); // Changez 'remove_from_cart.php' par le chemin de votre script de suppression du panier
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onload = function() {
    if (xhr.status === 200) {
        // Supprimer l'élément du panier du DOM
        const cartItem = document.getElementById('cart-item-' + productId);
        cartItem.remove();
        
        // Mettre à jour le total du panier
        updateCartTotal();
    }
};
xhr.send('product_id=' + productId); // Envoyer l'identifiant du produit au script PHP de suppression
}
// pour mettre à jour la quantité du produit dans le panier 

function updateCartItemQuantity(productId) {
    // Récupérer la nouvelle quantité du produit
    const newQuantity = document.getElementById('quantity_' + productId).value;

    // Envoyer une requête AJAX au fichier PHP pour mettre à jour la quantité
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_cart_item_quantity.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Mettre à jour le prix total du produit dans le panier avec les nouvelles informations renvoyées par le serveur
            const response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                document.getElementById('cart-total').textContent = response.newTotalPrice.toFixed(2);
            } else {
                alert('Erreur lors de la mise à jour du prix total du produit.');
            }
        }
    };
    xhr.send('product_id=' + productId + '&quantity=' + newQuantity);
}
