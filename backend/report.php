<?php
require '../auth.php';
require '../config.php';

// Fetch report data
$total_items = $pdo->query("SELECT COUNT(*) FROM inventory")->fetchColumn();
$total_quantity = $pdo->query("SELECT SUM(quantity) FROM inventory")->fetchColumn();
$total_value = $pdo->query("SELECT SUM(quantity * price) FROM inventory")->fetchColumn();

// Fetch category-wise data
$categories = $pdo->query("
    SELECT c.name AS category_name, COUNT(i.id) AS item_count, SUM(i.quantity * i.price) AS total_value
    FROM inventory i
    JOIN categories c ON i.category = c.name
    GROUP BY c.name
")->fetchAll(PDO::FETCH_ASSOC);

// Store the data in arrays
$category_names = [];
$item_counts = [];
$total_values = [];

foreach ($categories as $category) {
    $category_names[] = $category['category_name'];
    $item_counts[] = $category['item_count'];
    $total_values[] = $category['total_value'];
}

// Store the data in an array
$report_data = [
    'total_items' => $total_items,
    'total_quantity' => $total_quantity,
    'total_value' => number_format($total_value, 2),
    'category_names' => $category_names,
    'item_counts' => $item_counts,
    'total_values' => $total_values
];

// Return the data to the frontend
return $report_data;
?>





