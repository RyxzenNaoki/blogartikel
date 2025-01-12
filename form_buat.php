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

  <title>Buat Artikel</title>
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
        <section id="posts" class="posts">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Form Artikel</h2>
                        <div class="card">
                            <div class="card-body">
                                <form action="buat.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="judul">Judul:</label>
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul artikel">
                                    </div>
                                    <div class="form-group">
                                        <label for="subjudul">Subjudul:</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Masukkan subjudul artikel">
                                    </div>
                                    <div class="form-group">
                                        <label for="konten">Konten:</label>
                                        <textarea class="form-control" id="konten" name="konten" rows="10" placeholder="Masukkan konten artikel"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="subjudul">Kategori</label>
                                        <select class="form-select" id="kategori" name="kategori" placeholder="Pilih kategori">
                                            <option value="">Pilih kategori</option>
                                            <?php
                                            include "koneksi.php";
                                            $query= "SELECT * FROM kategori";
                                            $dt_query = $koneksi->query($query);
                                            while ($dt_artikel = $dt_query->fetch_array()) {?>
                                              <option value="<?php echo $dt_artikel['idkategori']; ?>"><?php echo $dt_artikel['nama']; ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="subjudul">Tag</label>
                                    <select class="form-select" id="tags" name="tags" placeholder="Pilih tag artikel">
                                        <option value="">Pilih tag artikel mu</option>
                                        <?php
                                        include "koneksi.php";
                                        $query= "SELECT * FROM tag";
                                        $dt_query = $koneksi->query($query);
                                        while ($dt_artikel = $dt_query->fetch_array()) {?>
                                            <option value="<?php echo $dt_artikel['idtag']; ?>"><?php echo $dt_artikel['nama']; ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="gambar">Gambar:</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                <p class="text-muted">Ukuran gambar maksimal 1 MB (jpg, jpeg, png)</p>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Buat Artikel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
</body>
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