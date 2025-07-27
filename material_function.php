<?php
require 'config.php';

function addMaterial($vendorId, $data, $image) {
    global $pdo;
    
    $imagePath = null;
    if ($image['error'] == UPLOAD_ERR_OK) {
        $imagePath = 'mat_' . uniqid() . '_' . $image['name'];
        move_uploaded_file($image['tmp_name'], 'uploads/' . $imagePath);
    }
    
    $stmt = $pdo->prepare("INSERT INTO raw_materials 
                          (vendor_id, category_id, name, description, price_per_unit, unit, available_quantity, image) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    return $stmt->execute([
        $vendorId,
        $data['category_id'],
        $data['name'],
        $data['description'],
        $data['price'],
        $data['unit'],
        $data['quantity'],
        $imagePath
    ]);
}

function getVendorMaterials($vendorId) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM raw_materials WHERE vendor_id = ?");
    $stmt->execute([$vendorId]);
    return $stmt->fetchAll();
}
?>