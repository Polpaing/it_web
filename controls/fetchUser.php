<?php
    include 'db.php';


    // ดึงข้อมูลผู้ใช้งานจาก Data base
    $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `created_at`, `role`, `profile_image` FROM `users`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>