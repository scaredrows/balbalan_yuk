<?php
session_start();
require "functions.php";

$loggedIn = isset($_SESSION['role']);

if ($loggedIn) {

  $id_user = $_SESSION["id_user"];

  // Melakukan query hanya jika $_SESSION["id_user"] sudah terdefinisi
  $profil = query("SELECT * FROM user WHERE id_user = '$id_user'")[0];
}

$lapangan = query("SELECT * FROM lapangan");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>BALBALANYUK!</title>
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
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Beranda<br></a></li>
          <li><a href="user/lapangan.php">Lapangan</a></li>
          <?php if ($loggedIn) : ?>
            <li class="nav-item">
              <a class="nav-link" href="user/pesanan.php">Pesanan</a>
            </li>
          <?php endif; ?>
          <li><a href="user/membership.php">Membership</a></li>
          <li><a href="user/promo.php">Promo</a></li>
          <li><a href="kontak.php">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <?php if ($loggedIn) : ?>
        <!-- Jika sudah login, tampilkan tombol profil -->
        <a class="btn-getstarted" data-bs-toggle="modal" data-bs-target="#profilModal">
          <i class="bi bi-person"></i> Profil
        </a>
      <?php else : ?>
        <!-- Jika belum login, tampilkan tombol login -->
        <a href="login.php" class="btn-getstarted" type="submit">
          <i class="bi bi-box-arrow-in-right"></i> Login
        </a>
      <?php endif; ?>


    </div>
  </header>

  <?php include 'edit_profit_modal.php'?>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Sehatkan Dirimu Dengan<br>Berolahraga di <span class="text-">  </span> <br> BALBALANYUK ! </h2>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="user/lapangan.php" class="btn-get-started">Booking Sekarang <i class="bi bi-arrow-right"></i></a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2 my-auto" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>BALBALANYUK ! Hadir Untuk Anda</h3>
            <p class="fst-italic">
              Temukan pengalaman olahraga yang luar biasa dengan fasilitas premium kami.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Fasilitas olahraga terbaru dan terlengkap untuk latihan yang lebih efektif.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Pelatih profesional yang siap membantu Anda mencapai tujuan dengan strategi yang terbukti.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Lingkungan yang mendukung dan nyaman, menciptakan suasana positif untuk setiap latihan.</span></li>
            </ul>
            <a href="#" class="read-more "><span>Pelajari Lebih Lanjut</span><i class="bi bi-arrow-right"></i></a>
          </div>


        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-6 col-lg-3 col-md-6">
            <div class="shadow rounded stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pelanggan</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-6 col-lg-3 col-md-6">
            <div class="shadow rounded stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
              <p>Lapangan</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-6 col-lg-3 col-md-6">
            <div class="shadow rounded stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
              <p>Membership</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Counts Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container d-flex justify-content-between align-items-center" data-aos="fade-up">
        <div class="left section-title">
          <h2>Lapangan</h2>
          <p>Lapangan Terbaik</p>
        </div>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <?php foreach ($lapangan as $row) : ?>

            <div class="col-6 col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="course-item">
                <img src="img/<?= $row["foto"]; ?>" class="img-fluid" alt="...">
                <div class="course-content">
                  <p class="category">Lapangan</p>
                </div>
                <div class="p-3 text-content">
                  <h3><a href="course-details.html"><?= $row["nama"]; ?></a></h3>
                  <p class="description"><?= $row["keterangan"]; ?></p>
                </div>
              </div>
            </div>

          <?php endforeach; ?>

        </div>

      </div>

    </section><!-- /Courses Section -->

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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>