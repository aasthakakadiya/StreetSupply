<?php
require '../includes/header.php';
require '../includes/auth_check.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'business_name' => $_POST['business_name'],
        'location' => $_POST['location'],
        'vendor_id' => $_SESSION['vendor_id']
    ];
    
    // Handle profile image upload
    $image_path = $current_vendor['profile_image'];
    if ($_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        // Delete old image if exists
        if ($image_path && file_exists('../uploads/' . $image_path)) {
            unlink('../uploads/' . $image_path);
        }
        
        // Upload new image
        $image_name = 'vendor_' . uniqid() . '_' . basename($_FILES['profile_image']['name']);
        move_uploaded_file($_FILES['profile_image']['tmp_name'], '../uploads/' . $image_name);
        $image_path = $image_name;
    }
    
    // Update vendor in database
    $stmt = $pdo->prepare("UPDATE vendors SET 
                          name = :name,
                          email = :email,
                          phone = :phone,
                          business_name = :business_name,
                          location = :location,
                          profile_image = :profile_image
                          WHERE vendor_id = :vendor_id");
    
    $stmt->execute(array_merge($data, ['profile_image' => $image_path]));
    
    $_SESSION['message'] = 'Profile updated successfully!';
    header("Location: profile.php");
    exit();
}
?>

<div class="dashboard-container">
    <?php include 'includes/sidebar.php'; ?>
    
    <div class="main-content">
        <div class="dashboard-header">
            <h1>My Profile</h1>
        </div>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        
        <div class="profile-form-container">
            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <div class="profile-image-upload">
                    <div class="current-image">
                        <?php if ($current_vendor['profile_image']): ?>
                            <img src="../uploads/<?php echo $current_vendor['profile_image']; ?>" alt="Profile Image">
                        <?php else: ?>
                            <div class="no-image"><i class="fas fa-user"></i></div>
                        <?php endif; ?>
                    </div>
                    <div class="upload-controls">
                        <label for="profile_image" class="btn-upload">
                            <i class="fas fa-camera"></i> Change Photo
                        </label>
                        <input type="file" id="profile_image" name="profile_image" accept="image/*">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($current_vendor['name']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($current_vendor['email']); ?>" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($current_vendor['phone']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="business_name">Business Name</label>
                        <input type="text" id="business_name" name="business_name" value="<?php echo htmlspecialchars($current_vendor['business_name']); ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="location">Location *</label>
                    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($current_vendor['location']); ?>" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
            
            <div class="change-password">
                <h3>Change Password</h3>
                <form action="change_password.php" method="POST">
                    <div class="form-group">
                        <label for="current_password">Current Password *</label>
                        <input type="password" id="current_password" name="current_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">New Password *</label>
                        <input type="password" id="new_password" name="new_password" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password *</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-key"></i> Change Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>