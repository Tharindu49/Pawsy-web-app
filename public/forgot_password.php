<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Pet Shop Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('Images/9007406.png'); /* Ensure this path is correct */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">Forgot Password</h3>
            <!-- Display error message -->
            <?php if (isset($_SESSION['error']) && $_SESSION['error']): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            <!-- Display success message -->
            <?php if (isset($_SESSION['success']) && $_SESSION['success']): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($_SESSION['success']) ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <!-- Forgot password form -->
            <form method="POST" action="../backend/forgot_password.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            <div class="text-center mt-3">
                <button id="backToLoginBtn" class="btn btn-secondary">Back to Login</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('backToLoginBtn').addEventListener('click', function() {
            window.location.href = '../public/login.php';
        });
    </script>
</body>
</html>
