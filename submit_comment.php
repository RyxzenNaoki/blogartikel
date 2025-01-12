<?php
session_start();
include "koneksi.php";

if (!isset($_POST['idartikel']) || !isset($_POST['comment'])) {
    die("Data tidak lengkap");
}

$username = $_SESSION['username'];
// Mendapatkan ID user dari username session
$iduser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT iduser FROM user WHERE username = '$username'"))['iduser'];
$idartikel = $_POST['idartikel'];
$comment = $_POST['comment'];
$tanggal = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO komentar (iduser, idartikel, comment, date) VALUES ('$iduser', '$idartikel', '$comment', '$tanggal')");

if ($query) {
    echo "Komentar berhasil ditambahkan";
} else {
    echo "Gagal menambahkan komentar: " . mysqli_error($koneksi);
}
?>
