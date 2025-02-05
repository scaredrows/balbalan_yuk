<?php
session_start();
require "../functions.php";

$loggedIn = isset($_SESSION['role']);

if ($loggedIn) {

  $id_user = $_SESSION["id_user"];

  // Melakukan query hanya jika $_SESSION["id_user"] sudah terdefinisi
  $profil = query("SELECT * FROM user WHERE id_user = '$id_user'")[0];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Basecamp Sport Center</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="../assets/img/logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="../index.php" >Beranda<br></a></li>
          <li><a href="lapangan.php">Lapangan</a></li>
          <?php if ($loggedIn): ?>
            <li>
              <a class="active" href="pesanan.php">Pesanan</a>
            </li>
        <?php endif; ?>
          <li><a href="membership.php" class="active">Membership</a></li>
          <li><a href="promo.php">Promo</a></li>
          <li><a href="../kontak.php">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php if ($loggedIn): ?>
            <!-- Jika sudah login, tampilkan tombol profil -->
            <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#profilModal">
                <i class="bi bi-person"></i> Profil
            </a>
        <?php else: ?>
            <!-- Jika belum login, tampilkan tombol login -->
            <a href="../login.php" class="btn-getstarted" type="submit">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        <?php endif; ?>



    </div>
  </header>

  <?php include '../edit_profit_modal.php'?>


  <main class="main">

   <!-- Page Title -->
   <div class="page-title" data-aos="fade">
    <img src="../assets/img/hero-bg.jpg" alt="">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Membership</h1>
              <p class="mb-0">Membership Program</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

  <section id="pricing" class="pricing section">

<div class="container">

  <div class="row gy-3">

    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
      <div class="pricing-item">
        <h3>Reguler</h3>
        <ul>
          <li></li>
          <li></li>
          <li></li>
          <li class="na"></li>
          <li class="na"></li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Pesan</a>
        </div>
      </div>
    </div><!-- End Pricing Item -->
    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
      <div class="pricing-item">
        <h3>Eksklusif</h3>
        <ul>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Pesan</a>
        </div>
      </div>
    </div><!-- End Pricing Item -->

    <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="400">
      <div class="pricing-item">
        <span class="advanced">Populer</span>
        <h3>Ultimate</h3>
        <ul>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <div class="btn-wrap">
          <a href="#" class="btn-buy">Pesan</a>
        </div>
      </div>
    </div><!-- End Pricing Item -->

  </div>

</div>

</section><!-- /Pricing Section -->
  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-6 col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Basecamp</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Puri Hijau</p>
            <p>Indonesia</p>
            <p class="mt-3"><strong>Phone:</strong> <span>085869161667</span></p>
            <p><strong>Email:</strong> <span>Balbalanyuk@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class=" col-6 col-lg-4 col-md-6 footer-links">
          <h4>Navigasi</h4>
          <div class="row">
            <div class="col-6 col-lg-4">
              <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Lapangan</a></li>
                <li><a href="#">Membership</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-4">
              <ul>
                <li><a href="#">Promo</a></li>
                <li><a href="#">Kontak</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-6 col-lg-4 col-md-6 footer-links">
          <h4>Syarat & Ketentuan</h4>
          <ul>
            <li><a href="#">Lihat Syarat & Ketentuan</a></li>
          </ul>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>