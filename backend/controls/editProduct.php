<?php
session_start();
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $product_name = $_POST['product'];
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
                    header("Location: ../editproduct.php?id=".$id);
                    exit;
                }
            } else {
                $_SESSION['error'] = "Invalid image format.";
                header("Location: ../editproduct.php?id=".$id);
                exit;
            }
        }
        
        $stmt = $pdo->prepare("UPDATE products SET product_name = ?, description = ?, price = ?" . ($product_image ? ", product_image = ?" : ""). " WHERE id = ?");
        $params = [$product_name, $description, $price];
        if ($product_image) {
            $params[] = $product_image;
        }
        $params[] = $id;
        $result = $stmt->execute($params);

        if($result){
            $_SESSION['success'] = "User updated successfully!";
            header("Location: ../product.php");
        } else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../editproduct.php?id=".$id);
        }
        exit;

    }

?>