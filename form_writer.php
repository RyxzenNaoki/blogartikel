<?php
// Menginclude koneksi database
include "koneksi.php";

// Memulai session
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('login.php');
    exit;
}

// Menampilkan data user yang login
$username = $_SESSION['username'];
$iduser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT iduser FROM user WHERE username = '$username'"))['iduser'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Writer</title>
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
<?php include 'header.php';?>
<main id="main">
    <section id="posts" class="posts">
    <div class="container mt-3">
      <div class="row">
        <h2>Dashboard Penulis</h2>
        <p>Welcome aboard, writers!</p>
              <div class="row">
                <div class="col-md-6">
                  <h3>Buat Artikel</h3>
                  <a href="form_buat.php" class="btn btn-primary">Buat</a>
                  <hr>
                  <h3>Daftar Artikel</h3>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "koneksi.php";
                      $query= "SELECT * FROM artikel, user WHERE artikel.iduser = $iduser and artikel.iduser = user.iduser";
                      $dt_query = $koneksi->query($query);
                      while ($dt_artikel = $dt_query->fetch_array()) {?>
                          <tr>
                          <td><?php echo $dt_artikel['judul']; ?></td>
                          <td><?php echo $dt_artikel['tanggal'];?></td>
                          <td>
                            <a href="edit_artikel.php?id=<?php echo $dt_artikel['idartikel']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapus_artikel.php?id=<?php echo $dt_artikel['idartikel']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                          </td>
                        </tr>
                     <?php }
                    ?>
                  </tbody>
                </table>
              </div>
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