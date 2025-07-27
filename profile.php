<?php
session_start();
require 'backend/db.php';

// Fake logged-in user (replace with session user_id from signup)
$user_id = 1; 

// Fetch user profile
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Profile - Swatha Basket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Update Your Profile</h2>
  <form action="update_profile.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Food Type</label>
      <input type="text" name="food_type" class="form-control" value="<?php echo $user['food_type']; ?>">
    </div>
    <div class="mb-3">
      <label>Location</label>
      <input type="text" name="location" class="form-control" value="<?php echo $user['location']; ?>">
    </div>
    <div class="mb-3">
      <label>Daily Needs (comma separated)</label>
      <textarea name="daily_needs" class="form-control"><?php echo $user['daily_needs']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
  </form>
</div>
</body>
</html>
