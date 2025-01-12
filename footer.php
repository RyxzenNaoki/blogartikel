 <footer id="footer" class="footer">

  <div class="footer-content">
    <div class="container">

      <div class="row g-5">
        <div class="col-lg-4">
          <h3 class="footer-heading">About LilyBlog</h3>
          <p>Tons of ideas but only kept in your precious notes? No way! Unleash your potential with submitting your article to LilyBlog. You'll get a great opportunity and expereience for your magnificent wirtings. Just type and boom! Voila!</p>
          <p><a href="about.php" class="footer-link-more">Learn More</a></p>
        </div>
        <div class="col-6 col-lg-2">
          <h3 class="footer-heading">Navigation</h3>
          <ul class="footer-links list-unstyled">
            <li><a href="dashboard.php"><i class="bi bi-chevron-right"></i> Home</a></li>
            <li><a href="category.php"><i class="bi bi-chevron-right"></i> Categories</a></li>
            <li><a href="about.php"><i class="bi bi-chevron-right"></i> About us</a></li>
            <li><a href="contact.php"><i class="bi bi-chevron-right"></i> Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-4">
          <h3 class="footer-heading">Recent Posts</h3>
          <?php
          include "koneksi.php";
          $query= mysqli_query($koneksi, "SELECT * FROM artikel, kategori WHERE artikel.idkategori = kategori.idkategori ORDER BY artikel.tanggal DESC LIMIT 3");
          $artikel = [];
          while ($dt_artikel = mysqli_fetch_assoc($query)) {$artikel[] = $dt_artikel;}
          $artikel_tampil = array_slice($artikel, 0, 3);
          foreach ($artikel_tampil as $data) {
            ?>
            <ul class="footer-links footer-blog-entry list-unstyled">
              <li>
                <a class="d-flex align-items-center">
                  <div>

                    <div class="post-meta d-block"><span class="date"><?php echo $data['nama']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo $data['tanggal']; ?></span></div>
                    <span><?php echo $data['judul']; ?></span>
                  </div>
                </a>
              </li>
            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-legal">
    <div class="container">

      <div class="row justify-content-between">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <div class="copyright">
            © Copyright <strong><span>LilyBlog</span></strong>. All Rights Reserved
          </div>

          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>

        </div>

      </div>

    </div>
  </div>

</footer>