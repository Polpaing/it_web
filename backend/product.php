<?php
include './controls/fetchProduct.php';
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
            <h2>จัดการรายการอาหาร</h2>
            <div class="mb-3"><a href="addproduct.php" class="btn btn-primary ">เพิ่มรายการอาหาร</a></div>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <!--<th>Id</th>-->
                        <th>Image</th>
                        <th>Product_name</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>Create_at</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="text-center"><?= $i++; ?></td>
                            <!-- <td class="text-center"><?= htmlspecialchars($row['id']); ?></td> -->
                            <td><img src="../assets/imgs/<?= htmlspecialchars($row['product_image']); ?>" alt="" style="width: 100px"></td>
                            <td class="text-center"><?= htmlspecialchars($row['product_name']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['description']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['price']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                            <td>
                                <a href="editproduct.php?id=<?=$row['id'] ?>" class="btn btn-sm 
                                btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id']; ?>)">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                 <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'คุณแน่ใจหรือไม่?',
                                            text: "คุณต้องการลบรายการอาหารนี้หรือไม่?",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'ใช่, ลบเลย',
                                            cancelButtonText: 'ยกเลิก'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                    window.location.href = `controls/deleteProduct.php?id=${id}`;
                                            }
                                        });
                                    }
                                </script> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        
    </main>  
    </div>
    

    <script>
        <?php if (isset($_SESSION['success'])) : ?>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: '<?= $_SESSION['success']; ?>',
            confirmbuttonText: 'ตกลง'
        }); 
    </script>
    <?php unset($_SESSION['error']);
        endif; ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <script>        
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Iavalid email or password',
                    footer: 'Please try again.'
                });
            </script>
        <?php unset($_SESSION['error']);
        endif; ?>

</body>

</html>