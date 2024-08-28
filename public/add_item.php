<?php
require '../auth.php';
require '../backend/fetch_categories.php'; // Fetch categories

$categories = getCategories(); // Get categories from backend
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - Pet Shop Management</title>
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
</head>
<body>
    <div class="d-flex">
        <?php include 'dashboard.php'; ?>
        <div class="container-fluid mt-3">
            <h2 class="text-center">Add New Inventory Item</h2>
            <form method="POST" action="../backend/add_item.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" min="0.01" required>
                    
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="" selected disabled>Select a category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Item</button>
            </form>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
