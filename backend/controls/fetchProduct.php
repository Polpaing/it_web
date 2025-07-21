<?php
    include 'db.php';
    session_start();

    // ดึงข้อมูลผู้ใช้งานจาก Data base
    $sql = "SELECT `id`, `product_name`, `description`, `price`, `created_at`,`product_image` FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>