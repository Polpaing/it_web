<?php
session_start();
include './controls/fetchUser.php';
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
            <h2>จัดการผู้ใช้งาน</h2>
            <table class="table table-bordered ">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Firsname, Lastname</th>
                        <th>E-mail</th>
                        <th>Tel Number</th>
                        <th>Create data</th>
                        <th>role</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($row['id']); ?></td>
                            <td><img src="../assets/imgs/<?= htmlspecialchars($row['profile_image']); ?>" alt="" style="width: 100px"></td>
                            <td class=""><?= htmlspecialchars($row['first_name']) . " " .  htmlspecialchars($row['last_name']); ?></td>
                            <td class=""><?= htmlspecialchars($row['email']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['phone']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['created_at']); ?></td>
                            <td class="text-center"><?= htmlspecialchars($row['role']); ?></td>
                            <td>
                                <a href="edituser.php?id=<?= $row['id'] ?>" class="btn btn-sm 
                                btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id']; ?>)">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <script>
                                    function confirmDelete(id) {
                                        Swal.fire({
                                            title: 'คุณแน่ใจหรือไม่?',
                                            text: "คุณต้องการลบผู้ใช้งานนี้หรือไม่?",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'ใช่, ลบเลย',
                                            cancelButtonText: 'ยกเลิก'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = `controls/deleteUser.php?id=${id}`;
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
</body>

</html>

<?php if (isset($_SESSION['success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: '<?= $_SESSION['success']; ?>',
            confirmbuttonText: 'ตกลง'
        });
    </script>
<?php unset($_SESSION['success']);
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