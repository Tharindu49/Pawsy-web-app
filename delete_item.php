<?php
require 'auth.php';
require 'config.php';

// Check if the 'id' parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validate that the ID is a valid integer
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        // Prepare and execute the deletion query
        $stmt = $pdo->prepare("DELETE FROM inventory WHERE id = ?");
        $stmt->execute([$id]);
    }
}

// Redirect back to the inventory page after deletion
header('Location: public/inventory.php');
exit();
?>
