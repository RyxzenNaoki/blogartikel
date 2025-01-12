<?php
// Catat aktivitas login
session_start();
include "koneksi.php";


$username = $_SESSION['username'];
// Mendapatkan ID user dari username session
$iduser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT iduser FROM user WHERE username = '$username'"))['iduser'];

$action = 'login';
$details = 'IP address: ' . $_SERVER['REMOTE_ADDR'];
$timestamp = date("Y-m-d H:i:s");
logActivity($timestamp, $iduser, $action, $details);

// Catat kunjungan halaman
$action = 'visit_page';
$details = 'Page: ' . $_SERVER['REQUEST_URI'];
$timestamp = date("Y-m-d H:i:s");
logActivity($timestamp, $iduser, $action, $details);


function logActivity($timestamp, $iduser, $action, $details) {
  // Koneksi database
  // Siapkan query SQL
  $sql = "INSERT INTO activity_log (timestamp, 
  	iduser, action, details) VALUES ($timestamp, $iduser, '$action', '$details')";
 $dt_query = $koneksi->query($sql);
  // Jalankan query dan periksa kesalahan
  if (mysqli_query($koneksi, $sql)) {
    // Log berhasil
  } else {
    echo "Error logging activity: " . mysqli_error($koneksi);
  }

  // Tutup koneksi database
  mysqli_close($koneksi);
}

?>