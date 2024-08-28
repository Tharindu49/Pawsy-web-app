<?php
require '../auth.php';
require '../config.php';

// Check if a search query is provided
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

// Modify the SQL query to include the search functionality
$sql = 'SELECT i.*, c.name AS category FROM inventory i LEFT JOIN categories c ON i.category = c.name';
$params = [];

if (!empty($searchQuery)) {
    $sql = "SELECT * FROM inventory WHERE CONCAT(name, ' ', description, ' ', category) LIKE :query;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['query' => '%' . $searchQuery . '%']);
} else {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);