<?php
require '../config.php';
require '../auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Fetch the category name based on the selected category ID
    $stmt = $pdo->prepare("SELECT name FROM categories WHERE id = ?");
    $stmt->execute([$category_id]);
    $category_name = $stmt->fetchColumn();

    // Update the inventory item
    $stmt = $pdo->prepare("UPDATE inventory SET name = ?, description = ?, quantity = ?, price = ?, category = ? WHERE id = ?");
    $stmt->execute([$name, $description, $quantity, $price, $category_name, $id]);

    header('Location: ../public/inventory.php');
    exit;
}
