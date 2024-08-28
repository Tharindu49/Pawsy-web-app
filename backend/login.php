<?php
require '../config.php'; // Adjusted path if config.php is in the parent directory

session_start(); // Ensure session management is started

$error = null; // Initialize the error variable

// Check if the user has an existing "Remember Me" cookie
<<<<<<< Updated upstream
if (isset($_COOKIE['remember_me_username']) && isset($_COOKIE['remember_me_password'])) {
    $username = $_COOKIE['remember_me_username'];
    $password = $_COOKIE['remember_me_password'];
    
    // Directly set these values to the session if needed, or use them to authenticate
    // For security reasons, we don't recommend directly using plaintext passwords
=======
if (isset($_COOKIE['remember_me_token'])) {
    $token = $_COOKIE['remember_me_token'];
    // Query the database to find the user associated with the token
    $stmt = $pdo->prepare('SELECT * FROM users WHERE remember_token = :token');
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // If the token matches, log in the user automatically
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../index.php');
        exit();
    }
>>>>>>> Stashed changes
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']);

    // Prepare SQL query to select the user with the given username
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password_hash'])) {
            // Password is correct, start the session
            $_SESSION['user_id'] = $user['id'];

            if ($remember_me) {
<<<<<<< Updated upstream
                // Set cookies for username and password (plaintext)
                setcookie('remember_me_username', $username, time() + (86400 * 30), '/'); // 30 days
                setcookie('remember_me_password', $password, time() + (86400 * 30), '/'); // 30 days
            } else {
                // Clear cookies if "Remember Me" is not checked
                setcookie('remember_me_username', '', time() - 3600, '/');
                setcookie('remember_me_password', '', time() - 3600, '/');
=======
                // Generate a random token for the remember me functionality
                $token = bin2hex(random_bytes(16));
                
                // Set the token as a cookie (valid for 30 days)
                setcookie('remember_me_token', $token, time() + (86400 * 30), '/');

                // Store the token in the database for the user
                $updateTokenStmt = $pdo->prepare('UPDATE users SET remember_token = :token WHERE id = :id');
                $updateTokenStmt->execute(['token' => $token, 'id' => $user['id']]);
>>>>>>> Stashed changes
            }

            header('Location: ../index.php');
            exit();
        } else {
            $error = "Invalid username or password."; // Set error message for invalid password
        }
    } else {
        $error = "Invalid username or password."; // Set error message for invalid username
    }
}
?>
