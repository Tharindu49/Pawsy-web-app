<?php
require '../config.php';
require '../auth.php';

// Set headers to force download the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=inventory_report.csv');

$output = fopen('php://output', 'w');



// Optionally: Write detailed inventory data
fputcsv($output, []); // Add an empty row for separation
fputcsv($output, ['Name', 'Description', 'Quantity', 'Price', 'Category']);
$stmt = $pdo->query("SELECT inventory.*, categories.name AS category_name FROM inventory JOIN categories ON inventory.category = categories.name");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($output, [$row['name'], $row['description'], $row['quantity'], $row['price'], $row['category_name']]);
}

// Write the header of the CSV file
fputcsv($output, ['Total Items', 'Total Quantity', 'Total Value']);

// Initialize totals
$totalItems = 0;
$totalQuantity = 0;
$totalValue = 0;

// Fetch data from the database
$stmt = $pdo->query("SELECT inventory.*, categories.name AS category_name FROM inventory JOIN categories ON inventory.category = categories.name");

// Calculate totals
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $totalItems++;
    $totalQuantity += $row['quantity'];
    $totalValue += $row['price'] * $row['quantity'];
}

// Write totals to the CSV file
fputcsv($output, [$totalItems, $totalQuantity, $totalValue]);
// Close the file pointer and exit
fclose($output);
exit;
?>