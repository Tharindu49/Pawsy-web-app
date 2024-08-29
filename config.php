<?php
// Database configuration
$host = 'mathee-server.mysql.database.azure.com';
$port = 3306;
$username = 'cuyyrnkwgz';
$password = 'S6jWJmAcAI$WkuoQ';
$dbname = 'petshop_db';

// Path to your SSL certificate
$ssl_ca = '/home/site/wwwroot/backend/ca-cert.pem';
 // Ensure this path is correct

// Create connection with SSL
$conn = new mysqli();
$conn->ssl_set(null, null, $ssl_ca, null, null);
$conn->real_connect($host, $username, $password, $dbname, $port, null, MYSQLI_CLIENT_SSL);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}
?>
