<?php
// Database configuration
$host = getenv('DB_HOST') ?: '127.0.0.1';
$db   = getenv('DB_NAME') ?: 'petshop_db';  // Database name
$user = getenv('DB_USER') ?: 'root';        // XAMPP default username
$pass = getenv('DB_PASS') ?: 'Sac@17085';            // XAMPP default password is empty

// Set DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Log the error instead of displaying it
    error_log("Database connection failed: " . $e->getMessage());
    die("Database connection failed. Please try again later.");
}
?>
