<?php
    session_start();
    if(!isset($_SESSION['user_id'])) {
        header("Location: signin.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Website</title>
        <!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- SweetAlert2 CDN -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include './components/header.php'; ?>
<!-- Hero Section -->
 <section class="hero text-white text-center py-5" style="background: linear-gradient(to right, #290054, #00b2ff); height: 100vh;">
    <div class="container h-100 d-flex flex-column justify-content-center">
        <h1 class="display-4">ยินดีต้อนรับสู่เว็บไซต์ของเรา</h1>
        <p class="lead">ค้นพบโลกแห่งเทคโนโลยีสารสนเทศและข่าวสารล่าสุดเกี่ยวกับการพัฒนาเทคโนโลยี</p>
        <a href="#contect" class="btn btn-light btn-lg mx-auto">เริ่มต้นตอนนี้</a>
    </div>
 </section>

<!--Contect Section-->
<section id="contect" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">เกี่ยวกับเทคโนโลยีสารสนเทศ</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus adipisci id enim officia! 
            Ipsum molestiae iusto blanditiis unde odit repellat!  Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nisi debitis natus, laudantium nihil ut distinctio dolorem illo voluptates! Alias molestias officiis nobis 
            consectetur! Possimus et ducimus hic doloremque recusandae? Lorem ipsum dolor, sit amet consectetur 
            adipisicing elit. Esse, natus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, facere placeat! Laborum autem amet nemo, obcaecati neque accusantium esse reprehenderit 
            quis itaque possimus at quam quaerat pariatur cum in incidunt!
        </p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis nihil repudiandae earum eum delectus mollitia. Dolorum, id! Beatae voluptatem corporis esse 
            quibusdam, quas rerum ullam dignissimos, tempora quia repellat molestias?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, pariatur nisi, a corporis magni quas 
            dicta Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus earum rerum non doloremque et. Non, eos necessitatibus amet accusantium officia voluptas sint exercitationem iusto. Porro mollitia est aut dolorem perspiciatis.
            reprehenderit incidunt recusandae ut porro. Sapiente dicta sint, dolor mollitia cumque minus consequuntur voluptatum.
        </p>
    </div>
</section>
 <?php include './components/footer.php'; ?>

    
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
