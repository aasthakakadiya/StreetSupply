<?php
session_start();
require 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $check = $conn->query("SELECT id FROM users WHERE username='$username' OR email='$email'");
    if ($check->num_rows > 0) {
        $error = "Username or Email already exists.";
    } else {
        $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up - LinkedIn Clone</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 400px;">
  <h2>Sign Up</h2>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>
  <form method="post" action="">
    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-success w-100" type="submit">Sign Up</button>
  </form>
  <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
