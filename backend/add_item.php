<?php
require '../config.php';
require '../auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Fetch the category name based on the selected category ID
    $stmt = $pdo->prepare("SELECT name FROM categories WHERE id = ?");
    $stmt->execute([$category_id]);
    $category_name = $stmt->fetchColumn();

    // Insert data into the 'inventory' table
    $stmt = $pdo->prepare("INSERT INTO inventory (name, description, quantity, price, category) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $quantity, $price, $category_name]);

    header('Location: ../public/inventory.php');
    exit;
}
