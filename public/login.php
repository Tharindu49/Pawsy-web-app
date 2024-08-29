

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pet Shop Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('Images/9007406.png'); /* Ensure this path is correct */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Full viewport height */
            margin: 0;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px; /* Adjust as needed */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Add a shadow for better visibility */
            text-align: center; /* Centering text inside the card */
        }

        .form-check {
            display: flex;
            justify-content: center; /* Center the checkbox and label */
            align-items: center; /* Align vertically */
        }

        .form-check-label {
            margin-left: 10px; /* Space between the checkbox and label */
        }

        .btn-light-blue {
            background-color: transparent;
            color: #007bff; /* Light blue color */
            border-color: #007bff;
        }

        .btn-light-blue:hover {
            background-color: rgba(0, 123, 255, 0.1);
            color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-5 p-4">
            <div class="card-body">
                <h3 class="text-center mb-4">Login</h3>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-label="Username" 
                            value="<?= isset($_COOKIE['remember_me_username']) ? htmlspecialchars($_COOKIE['remember_me_username']) : '' ?>" 
                            required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" aria-label="Password"
                            value="<?= isset($_COOKIE['remember_me_password']) ? htmlspecialchars($_COOKIE['remember_me_password']) : '' ?>" 
                            required>
                        <i class="bi bi-eye-slash position-absolute end-0 top-50 translate-middle-y me-3 cursor-pointer" id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" 
                            <?= isset($_COOKIE['remember_me_username']) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <!-- <a href="forgot_password.php" class="text-decoration-none">Forgot Password?</a> -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password visibility toggle
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // Toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // Toggle the icon
            this.classList.toggle("bi-eye");
            this.classList.toggle("bi-eye-slash");
        });
    </script>
</body>
</html>
