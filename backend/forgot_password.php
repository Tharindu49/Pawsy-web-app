<?php
// Start the session (if not already started)
session_start();

// Include your database connection file
require '../config.php'; // Adjust the path if necessary

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Ensure the path is correct for autoload.php

// Define variables and set to empty values
$email = $error = $success = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    // Check if the email is empty
    if (empty($email)) {
        $error = "Please enter your email address.";
    } else {
        // Check if the email exists in the database
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the email is registered in the system
        if ($stmt->rowCount() > 0) {
            // Generate a unique password reset token
            $token = bin2hex(random_bytes(50));
            $token_expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

            // Store the token and expiry in the database
            $updateQuery = "UPDATE users SET reset_token = :token, reset_token_expiry = :expiry WHERE email = :email";
            $stmt = $pdo->prepare($updateQuery);
            $stmt->bindParam(':token', $token);
            $stmt->bindParam(':expiry', $token_expiry);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                // Generate a reset link
                $reset_link = "http://localhost/Petshop/frontend/reset_password.php?token=" . $token;

                // Create a new PHPMailer instance
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.example.com';                     // Set the SMTP server to send through (replace with your SMTP server)
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'your-email@example.com';               // SMTP username (replace with your email)
                    $mail->Password   = 'your-email-password';                  // SMTP password (replace with your email password)
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                    $mail->Port       = 587;                                    // TCP port to connect to (use 587 for TLS or 465 for SSL)

                    // Recipients
                    $mail->setFrom('no-reply@petshop.com', 'Pet Shop Management'); // Sender's email and name
                    $mail->addAddress($email);                                  // Add the user's email address

                    // Content
                    $mail->isHTML(true);                                        // Set email format to HTML
                    $mail->Subject = 'Password Reset Request';
                    $mail->Body    = "Click on this link to reset your password: <a href='$reset_link'>$reset_link</a>";
                    $mail->AltBody = "Click on this link to reset your password: $reset_link"; // Plain text for non-HTML clients

                    $mail->send();
                    $_SESSION['success'] = 'Password reset link has been sent to your email.';
                } catch (Exception $e) {
                    $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                $error = "Something went wrong. Please try again later.";
            }
        } else {
            $error = "No account found with that email address.";
        }
    }

    // Redirect or display message
    if ($error) {
        $_SESSION['error'] = $error;
        header('Location: ../public/forgot_password.php');
        exit();
    }

    if ($success) {
        $_SESSION['success'] = $success;
        header('Location: ../public/forgot_password.php');
        exit();
    }
} else {
    // If not a POST request, redirect to the forgot password page
    header('Location: ../public/forgot_password.php');
    exit();
}
