<?php
// Menginclude koneksi database
include"koneksi.php";

// Memulai session
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Category</title>
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

    <?php include('header.php'); ?>
    <main id="main">
        <section id="Business">
          <div class="container">
            <div class="row">
                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Category: Business</h3>
                    <?php
                    include "koneksi.php";
                    $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 1";
                    $dt_query = $koneksi->query($query);
                    while ($dt_artikel = $dt_query->fetch_array()) {?>
                        <div class="d-md-flex post-entry-2 half">
                            <div>
                                <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                                <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                                <p><?php echo $dt_artikel['subtitle']; ?></p>
                                <div class="d-flex align-items-center author">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <hr>
            </div>
        </div>
    </section>
    <section id="Culture">
      <div class="container">
        <div class="row">
            <div class="col-md-9" data-aos="fade-up">
                <h3 class="category-title">Category: Culture</h3>
                <?php
                include "koneksi.php";
                $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 2";
                $dt_query = $koneksi->query($query);
                while ($dt_artikel = $dt_query->fetch_array()) {?>
                    <div class="d-md-flex post-entry-2 half">
                        <div>
                            <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                            <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                            <p><?php echo $dt_artikel['subtitle']; ?></p>
                            <div class="d-flex align-items-center author">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <hr>
        </div>
    </div>
</section>
<section id="Sport">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Sport</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 3";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</div>
</section>

<section id="Food">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Food</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 4";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>

    </div>
</div>
</section>
<section id="Politics">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Politics</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 5";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>

    </div>
</div>
</section>

<section id="Celebrity">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Celebrity</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 6";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</div>
</section>
<section id="Startups">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Startups</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 7";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</div>
</section>
<section id="Travel">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Travel</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 8";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <hr>
    </div>
</div>
</section>
<section id="Stories">
  <div class="container">
    <div class="row">
        <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Category: Stories</h3>
            <?php
            include "koneksi.php";
            $query= "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori and artikel.idkategori = 9";
            $dt_query = $koneksi->query($query);
            while ($dt_artikel = $dt_query->fetch_array()) {?>
                <div class="d-md-flex post-entry-2 half">
                    <div>
                        <div class="post-meta"><span class="date"><?php echo $dt_artikel['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $dt_artikel['tanggal']; ?></span></div>
                        <h3><a href="artikel.php"><?php echo $dt_artikel['judul']; ?></a></h3>
                        <p><?php echo $dt_artikel['subtitle']; ?></p>
                        <div class="d-flex align-items-center author">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</section>
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