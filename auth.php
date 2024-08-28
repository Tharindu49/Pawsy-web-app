<?php
// Start the session
session_start();

// Check if the user is logged in by verifying the existence of 'user_id' in the session
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect them to the login page
    header('Location: public/login.php'); // Adjusted to match your directory structure
    exit();
}

// Optional: Implement a session timeout or regenerate session ID to enhance security
// For example, regenerate session ID to prevent session fixation
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

// Optionally, implement session timeout
$timeout_duration = 1800; // 30 minutes
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();     // Unset $_SESSION variable for the run-time 
    session_destroy();   // Destroy the session data in storage
    header('Location: ../public/login.php');
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp

?>
