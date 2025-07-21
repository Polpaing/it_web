<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header("location: /itweb/index.php");
}
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $product_image = null;

        if(isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0){
            $target_dir = "../../assets/imgs/";
            $image_name = basename($_FILES["product_image"]["name"]);
            $target_files = $target_dir . $image_name;

            $imageFileType = strtolower(pathinfo($target_files, PATHINFO_EXTENSION));
            if(in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_files)) {
                    $product_image = $image_name;
                } else {
                    $_SESSION['error'] = "Failed to upload image.";
                    header("Location: ../addproduct.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid image format.";
                header("Location: ../addproduct.php");
                exit;
            }
        }

 $sql = "INSERT INTO products (product_name, description, price, product_image) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $product_name,
            $description,
            $price,
            $product_image
        ]);
        header("Location: ../index.php");
    }
       
?>