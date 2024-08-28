<?php
require '../config.php';
require '../auth.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        header('Location: ../public/register.php?error=Passwords do not match');
        exit;
    }

    // Validate phone number length
    if (strlen($phone) !== 10 || !ctype_digit($phone)) {
        header('Location: ../public/register.php?error=Phone number must be exactly 10 digits');
        exit;
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if the user already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        $userExists = $stmt->fetchColumn();

        if ($userExists) {
            header('Location: ../public/register.php?error=User with this username or email already exists');
            exit;
        }

        // Prepare the SQL statement for insertion
        $stmt = $pdo->prepare("INSERT INTO users (username, email, phone_number, password_hash) VALUES (?, ?, ?, ?)");

        // Execute the statement
        if ($stmt->execute([$username, $email, $phone, $password_hash])) {
            header('Location: ../public/register.php?success=User successfully added');
        } else {
            header('Location: ../public/register.php?error=Failed to add user');
        }
    } catch (PDOException $e) {
        // Log the error
        error_log("Error adding user: " . $e->getMessage());
        header('Location: ../public/register.php?error=An error occurred. Please try again later.');
    }
}
?>
