<?php
  session_start();
  include "koneksi.php";
  error_reporting(E_ALL^(E_NOTICE|E_WARNING));

  if(!isset($_SESSION['username'])){
    die("Anda belum login");
  }
  $user=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/iconfix.png" rel="icon">
  <link href="assets/img/iconfix.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('header.php'); ?>

  <main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-1.jpg');">
                    <div class="img-bg-inner">
                      <h2>We Offer You The Best Blogging Experience!</h2>
                      <p>Tons of ideas but only kept in your precious notes? No way! Unleash your potential with submitting your article to LilyBlog. You'll get a great opportunity and expereience for your magnificent wirtings. Just type and boom! Voila!</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-2.jpg');">
                    <div class="img-bg-inner">
                      <h2>Simplify your life: Discover hacks, guides, and resources to make your day-to-day easier and more efficient.</h2>
                      <p>Feeling overwhelmed? This blog is packed with practical tips and strategies to streamline your life and free up your time for what matters most.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a class="img-bg d-flex align-items-end" style="background-image: url('assets/img/post-slide-3.jpg');">
                    <div class="img-bg-inner">
                      <h2>Stay ahead of the curve: Get the latest trends, insights, and analysis delivered straight to your inbox.</h2>
                      <p>This blog keeps you informed and in the know. We cover hot topics, emerging trends, and expert analysis to help you navigate the ever-changing world.</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <?php
      include "koneksi.php";
      $query= mysqli_query($koneksi, "SELECT * FROM artikel, user WHERE artikel.iduser = user.iduser LIMIT 5");
      $artikel = [];
      while ($dt_artikel = mysqli_fetch_assoc($query)) {$artikel[] = $dt_artikel;}
      $artikel_tampil = array_slice($artikel, 0, 5); ?>
      <section id="posts" class="posts">
        <?php foreach ($artikel_tampil as $data) {
        ?>
        <div class="container px-4 px-lg-5">
          <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
              <!-- Post preview-->

              <div class="post-preview">
                <a href="artikel.php?id=<?php echo $data['idartikel']; ?>">
                  <h2 class="post-title"><?php echo $data['judul']; ?></h2>
                  <h4 class="post-subtitle"><?php echo $data['subtitle']; ?></h4>
                </a>
                <p class="post-meta">
                  Posted by
                  <a><?php echo $data['username']; ?></a>
                  on <?php echo $data['tanggal']; ?>
                </p>
              </div>
              <hr class="my-4" />
            </div>
          </div>
        </div>
        <?php } ?>
      </section> <!-- End Post Grid Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('footer.php'); ?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

  </html>