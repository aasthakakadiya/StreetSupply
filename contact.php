<?php 
$page_title = "Contact Us";
require 'includes/header.php'; 

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);
    
    // Basic validation
    $errors = [];
    if (empty($name)) $errors[] = "Name is required";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($message)) $errors[] = "Message is required";
    
    if (empty($errors)) {
        // Process the form (in a real app, you would send an email or save to database)
        $to = "contact@vendorsupply.com";
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = "From: $email";
        
        // mail($to, $subject, $body, $headers); // Uncomment in production
        
        $_SESSION['message'] = "Thank you for contacting us! We'll get back to you soon.";
        header("Location: contact.php");
        exit();
    }
}
?>

<section class="contact-section">
    <div class="container">
        <h1>Contact VendorSupply</h1>
        <p class="subtitle">We'd love to hear from you</p>
        
        <div class="contact-content">
            <div class="contact-info">
                <div class="info-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Our Office</h3>
                    <p>123 Market Street<br>Mumbai, Maharashtra 400001</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-phone-alt"></i>
                    <h3>Call Us</h3>
                    <p>+91 98765 43210<br>Mon-Fri, 9am-6pm</p>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Email Us</h3>
                    <p>contact@vendorsupply.com<br>support@vendorsupply.com</p>
                </div>
                
                <div class="social-links">
                    <h3>Connect With Us</h3>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-error">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
                    </div>
                <?php endif; ?>
                
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" id="name" name="name" required 
                               value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required
                                   value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone"
                                   value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Your Message *</label>
                        <textarea id="message" name="message" rows="5" required><?php 
                            echo isset($message) ? htmlspecialchars($message) : ''; 
                        ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
        
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.715922254356!2d72.8328643149003!3d19.04338868711086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c91130392c07%3A0x3c47bf391c8de931!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>