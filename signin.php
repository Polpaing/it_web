<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card shadow" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body p-4">
                        <!-- เข้าสู๋ระบบ -->
                        <h2 class="text-center">SignIn</h2>
                        <form method="POST" action="./controls/signinUsers.php">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">SignIn</button>
                        </form>
                        <!--สมัครสมาชิก-->
                        <div class="text-center mt-3">
                            <span>Don't have an account?</span>
                            <a href="signup.php">SignUp</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <img src="https://i.pinimg.com/736x/1c/69/18/1c6918da381f374c5eb7e75149c8e379.jpg" alt="" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
            </div>
        </div>
    </div>

    </form>
    </div>

    <script>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Iavalid email or password',
                footer: 'Please try again.'
            });
        <?php endif; ?>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: 'You have signed',
                footer: 'succeed'
            });
        <?php endif; ?>
    </script>

</body>

</html>
<!-- <div>
    <h2>SignIn Page</h2>
    <form method="POST" action="./controls/signinUsers.php">
        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>

        <div>
            <label for="">Password</label>
            <input type="password" name="pass">
        </div>

        <button type="submit">SignIn NOW!!! For Get Roblux</button>
    </form>
</div> -->