<?php
require 'config.php';

function registerVendor($data) {
    global $pdo;
    
    $stmt = $pdo->prepare("INSERT INTO vendors (name, email, password, phone, business_name, location) 
                          VALUES (?, ?, ?, ?, ?, ?)");
    
    $hashed = password_hash($data['password'], PASSWORD_BCRYPT);
    
    return $stmt->execute([
        $data['name'],
        $data['email'],
        $hashed,
        $data['phone'],
        $data['business_name'],
        $data['location']
    ]);
}

function loginVendor($email, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM vendors WHERE email = ?");
    $stmt->execute([$email]);
    $vendor = $stmt->fetch();
    
    if ($vendor && password_verify($password, $vendor['password'])) {
        return $vendor;
    }
    
    return false;
}
?>