<?php
session_start(); // Start the session
require 'config.php'; // Include your database configuration

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Clear the remember token from the database
    $stmt = $pdo->prepare('UPDATE users SET remember_token = NULL WHERE id = :id');
    $stmt->execute(['id' => $_SESSION['user_id']]);
}

// Clear all session variables
session_unset();

// Remove the "Remember Me" cookie if it exists
if (isset($_COOKIE['remember_me_token'])) {
    // Unset the cookie by setting its expiration date in the past
    setcookie('remember_me_token', '', time() - 3600, '/');
}

// Regenerate session ID to prevent fixation attacks
session_regenerate_id(true);

// Destroy the session
session_destroy();

// Redirect to the login page
header('Location: public/login.php');
exit();
?>
