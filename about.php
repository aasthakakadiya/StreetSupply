<?php 
$page_title = "About Us";
require 'includes/header.php'; 
?>

<section class="about-section">
    <div class="container">
        <h1>About VendorSupply</h1>
        <p class="subtitle">Connecting street food vendors with trusted suppliers across India</p>
        
        <div class="about-content">
            <div class="about-image">
                <img src="assets/images/about-us.jpg" alt="Street food vendors in India">
            </div>
            
            <div class="about-text">
                <h2>Our Story</h2>
                <p>Founded in 2023, VendorSupply was born out of a simple observation - street food vendors across India struggle to source quality raw materials at fair prices. Our platform bridges this gap by creating a direct connection between vendors and suppliers.</p>
                
                <h2>Our Mission</h2>
                <p>To empower street food vendors by providing:</p>
                <ul>
                    <li>Access to quality ingredients at wholesale prices</li>
                    <li>Transparent pricing and reliable suppliers</li>
                    <li>Tools to manage their supply chain efficiently</li>
                </ul>
                
                <h2>Why Choose Us?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <i class="fas fa-rupee-sign"></i>
                        <h3>Best Prices</h3>
                        <p>Direct from suppliers means no middlemen and lower costs</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-check-circle"></i>
                        <h3>Verified Suppliers</h3>
                        <p>All suppliers undergo strict quality checks</p>
                    </div>
                    <div class="feature-card">
                        <i class="fas fa-truck"></i>
                        <h3>Reliable Delivery</h3>
                        <p>On-time delivery to your location</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="assets/images/team1.jpg" alt="Founder">
                    <h3>Rajesh Kumar</h3>
                    <p>Founder & CEO</p>
                </div>
                <div class="team-member">
                    <img src="assets/images/team2.jpg" alt="Operations Head">
                    <h3>Priya Sharma</h3>
                    <p>Operations Head</p>
                </div>
                <div class="team-member">
                    <img src="assets/images/team3.jpg" alt="Technology Lead">
                    <h3>Arun Patel</h3>
                    <p>Technology Lead</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>