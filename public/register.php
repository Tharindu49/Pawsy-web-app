<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - Pet Shop Management</title>

    <!-- Include Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            position: relative;
            background-image: url('Images/9007406.png'); /* Ensure this path is correct */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            max-width: 400px;
            padding: 15px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-body {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
        }
        .btn-secondary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 300px;
            display: none;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <!-- Success or Error Messages -->
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success mt-3" role="alert">
            <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Add User</h1>
                <form action="../backend/register.php" method="POST" id="addUserForm">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control" required pattern="\d{10}" title="Phone number must be exactly 10 digits">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                    <a href="../index.php" class="btn btn-secondary btn-back">
                        <i class="bi bi-arrow-left"></i> Back to Home
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.display = 'block';
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000); // Hide after 5 seconds
            }

            const form = document.getElementById('addUserForm');
            form.addEventListener('submit', function (event) {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirm_password').value;

                if (password !== confirmPassword) {
                    alert('Passwords do not match.');
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
</body>
</html>
