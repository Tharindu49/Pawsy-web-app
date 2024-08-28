<?php


$stmt = $pdo->query("SELECT inventory.*, categories.name AS category_name FROM inventory JOIN categories ON inventory.category = categories.id");
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Pet Shop Management</title>
    
    <!-- Include Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/styles.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="public/images/Pet_Shop_Logo.png" alt="Pet Shop Logo" width="220" height="90" class="d-inline-block align-text-top">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown for User Management -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="userManagementDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User Management
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userManagementDropdown">
                            <li><a class="dropdown-item" href="public/register.php">Add User</a></li>
                            <li><a class="dropdown-item" href="public/remove_user.php">Remove User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Welcome to PAWSY</h1>
        <div class="row mt-5">
            <!-- Inventory Items -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm card-inventory">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4 class="card-title">Inventory Items</h4>
                        <p class="card-text">Manage your inventory items efficiently</p>
                        <a href="public/inventory.php" class="btn btn-light">View Inventory</a>
                    </div>
                </div>
            </div>
            <!-- Add New Item -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm card-add-item">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                        <h5 class="card-title">Add New Item</h5>
                        <p class="card-text">Add new items to your inventory seamlessly</p>
                        <a href="public/add_item.php" class="btn btn-light">Add Item</a>
                    </div>
                </div>
            </div>
            <!-- Generate Reports -->
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm card-reports">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="bi bi-file-earmark-bar-graph"></i>
                        </div>
                        <h5 class="card-title">Generate Reports</h5>
                        <p class="card-text">Generate detailed inventory reports</p>
                        <a href="public/report.php" class="btn btn-light">Generate Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
