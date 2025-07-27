<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VendorSupply</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Vendor Login</h1>
                <p>Access your vendor account to manage your materials</p>
            </div>
            
            <?php if (isset($login_error)): ?>
                <div class="alert alert-error">
                    <?php echo $login_error; ?>
                </div>
            <?php endif; ?>
            
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </div>
                
                <div class="auth-footer">
                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                    <p><a href="forgot_password.php">Forgot your password?</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/auth.js"></script>
</body>
</html>