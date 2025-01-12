<?php
session_start();
include "koneksi.php";
error_reporting(E_ALL^(E_NOTICE|E_WARNING));

if(!isset($_SESSION['username'])){
  die("Anda belum login");
}
$user=$_SESSION['username'];
$level=$_SESSION['level']
?>
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1>LilyBlog</h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <?php if ($level == "Writer"){ ?>
          <li><a href="form_writer.php">Home</a></li>
        <?php }
        else { ?>
          <li><a href="dashboard.php">Home</a></li>
        <?php }
      ?>
      <li class="dropdown"><a href="category.php"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="category.php #Business">Business</a></li>
          <li><a href="category.php #Culture">Culture</a></li>
          <li><a href="category.php #Sport">Sport</a></li>
          <li><a href="category.php #Food">Food</a></li>
          <li><a href="category.php #Politics">Politics</a></li>
          <li><a href="category.php #Celebrity">Celebrity</a></li>
          <li><a href="category.php #Startups">Startups</a></li>
          <li><a href="category.php #Travel">Travel</a></li>
          <li><a href="category.php #Stories">Stories</a></li>
        </ul>
      </li>
    </ul>
  </nav><!-- .navbar -->

  <div class="position-relative">
    <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
    <a href="logout.php"><button type="button" class="btn btn-primary rounded-pill">Log Out</button></a>
    <i class="bi bi-list mobile-nav-toggle"></i>

    <!-- ======= Search Form ======= -->
    <div class="search-form-wrap js-search-form-wrap">
      <form action="search-result.html" class="search-form">
        <span class="icon bi-search"></span>
        <input type="text" placeholder="Search" class="form-control">
        <button class="btn js-search-close"><span class="bi-x"></span></button>
      </form>
    </div><!-- End Search Form -->

  </div>

</div>

  </header><!-- End Header -->