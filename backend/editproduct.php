

<?php

include 'controls/idproduct.php';

session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: /itweb/index.php");
    exit;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- SweetAlert2 CDN -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="d-flex">
        <?php include '../backend/components/header.php'; ?>

        <main class="p-4 flex-grow-1">
            <h2>แก้ไขเมนู</h2>
            <form action="controls/editProduct.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product['id']; ?>">

                <div class="mb-3">
                    <label for="product_name" class="form-label">Product_name</label>
                    <input type="text" id="product_name" name="product" class="form-control"
                        value="<?= htmlspecialchars($product['product_name']); ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" id="description" name="description" class="form-control"
                        value="<?= htmlspecialchars($product['description']); ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" id="price" name="price" class="form-control"
                        value="<?= htmlspecialchars($product['price']); ?>">
                </div>
                <div class="mb-3">
                    <label for="product_image" class="mb-1">Picture</label>
                    <br><img src="../assets/imgs/<?= htmlspecialchars($product['product_image']); ?>" alt="" style="width: 100px">
                <div class="mb-3">
                    <label for="">Picture</label>
                    <input type="file" name="product_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
                <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                <a href="product.php" class="btn btn-secondary">ย้อนกลับ</a>
            </form>
        </main>
    </div>
</body>

</html>
