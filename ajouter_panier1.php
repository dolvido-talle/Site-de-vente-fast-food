<?php
// Inclure la page de connexion
include_once "admin/database.php";

// Vérifier si une session existe
if (!isset($_SESSION)) {
    // Si non, démarrer la session
    session_start();
}

// Créer la session du panier s'il n'existe pas
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

// Récupération des ID des produits dans le panier
$ids = array_keys($_SESSION['panier']);

// Afficher les éléments du panier et calculer le total
if (empty($ids)) {
    echo "Votre panier est vide";
} else {
    $total = 0;

    // Récupérer les détails de chaque produit dans le panier depuis la base de données
    $products = mysqli_query($con, "SELECT * FROM items WHERE id IN (" . implode(',', $ids) . ")");

    while ($product_data = mysqli_fetch_assoc($products)) {
        $product_id = $product_data['id'];
        $quantity = $_SESSION['panier'][$product_id];
        $product_price = $product_data['price'];

        // Calculez le total pour ce produit et ajoutez-le au total général
        $total += $product_price * $quantity;

        // Affichez les détails du produit et la quantité
        echo "Nom: " . $product_data['name'] . "<br>";
        echo "Prix: " . $product_price . "€<br>";
        echo "Quantité: " . $quantity . "<br>";
        echo "Action: <a href='panier.php?del=$product_id'>Supprimer</a><br><br>";
    }

    // Affichez le total
    echo "Total : " . number_format($total, 2) . "€";
}
?>
