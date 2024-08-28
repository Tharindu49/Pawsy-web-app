<?php
require '../config.php';

// Fetch all users
$stmt = $pdo->query("SELECT id, password_hash FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    $password = $user['password_hash'];

    // Check if the password is already hashed (assumes the length of a hashed password is 60 characters)
    if (strlen($password) !== 60 || !password_get_info($password)['algo']) {
        // Hash the password if it's not already hashed
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $update_stmt = $pdo->prepare("UPDATE users SET password_hash = :password WHERE id = :id");
        $update_stmt->execute(['password' => $hashed_password, 'id' => $user['id']]);

        echo "Password for user ID {$user['id']} has been hashed and updated.<br>";
    } else {
        echo "Password for user ID {$user['id']} is already hashed.<br>";
    }
}
?>
