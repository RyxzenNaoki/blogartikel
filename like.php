<?php
session_start();
include "koneksi.php";

$username = $_SESSION['username'];
// Mendapatkan ID user dari username session
$iduser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT iduser FROM user WHERE username = '$username'"))['iduser'];
$idartikel = $_POST['idartikel'];

// Periksa apakah pengguna telah menyukai artikel ini
$query = mysqli_query($koneksi, "SELECT * FROM likes WHERE iduser = '$iduser' AND idartikel = '$idartikel'");
if (mysqli_num_rows($query) > 0) {
    // Jika sudah like, maka hapus like
    $deleteQuery = mysqli_query($koneksi, "DELETE FROM likes WHERE iduser = '$iduser' AND idartikel = '$idartikel'");
    if ($deleteQuery) {
        echo 'unliked';
    }
} else {
    // Jika belum like, maka tambahkan like
    $insertQuery = mysqli_query($koneksi, "INSERT INTO likes (iduser, idartikel) VALUES ('$iduser', '$idartikel')");
    if ($insertQuery) {
        echo 'liked';
    }
}
?>
