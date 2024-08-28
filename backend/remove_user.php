<?php
require '../config.php';
require '../auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];

    try {
        // Check if the user exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $userExists = $stmt->fetchColumn();

        if (!$userExists) {
            header('Location: ../public/remove_user.php?error=User does not exist');
            exit;
        }

        // Delete the user
        $stmt = $pdo->prepare("DELETE FROM users WHERE username = ?");
        if ($stmt->execute([$username])) {
            header('Location: ../public/remove_user.php?success=User successfully removed');
        } else {
            header('Location: ../public/remove_user.php?error=Failed to remove user');
        }
    } catch (PDOException $e) {
        error_log("Error removing user: " . $e->getMessage());
        header('Location: ../public/remove_user.php?error=An error occurred. Please try again later.');
    }
} else {
    // Fetch all users from the database
    try {
        $stmt = $pdo->query("SELECT username, email, phone_number FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching users: " . $e->getMessage());
        $users = [];
    }

    // Include the frontend view
    include '../public/remove_user_view.php';
}
?>
