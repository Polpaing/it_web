<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddProduct</title>
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
    
    <main class="p-4 flex-grow-1">
        <h2>AddProduct</h2>
        <form method="POST" action="controls/createProduct.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="product_name" class="form-label">Product_name</label>
              <input type="text" name="product_name" class="form-control" require>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <input type="text" name="description" class="form-control" require>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" name="price" class="form-control" require>
            </div>
            <div class="mb-3">
                    <label for="product_image">Picture</label>
                    <input type="file" name="product_image" class="form-control">
            </div>
             <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
             <button type="reset" class="btn btn-danger">รีเซ็ต</button>
             <a href="product.php" class="btn btn-secondary">ย้อนกลับ</a>
        </form>
        
    </main>
</body>

</html>