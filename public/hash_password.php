<?php
require '../auth.php'; // Ensures only authorized users can run this script

// Redirect to the backend file for processing
header('Location: ../backend/hash_password.php');
exit();
