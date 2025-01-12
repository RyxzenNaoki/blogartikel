<?php
session_start();
include "koneksi.php";

if (!isset($_POST['comment']) || !isset($_POST['reply'])) {
    die("Data tidak lengkap");
}

$username = $_SESSION['username'];
// Mendapatkan ID user dari username session
$iduser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT iduser FROM user WHERE username = '$username'"))['iduser'];
$comment = $_POST['comment'];
$idkomen = mysqli_fetch_array(mysqli_query($koneksi, "SELECT idkomen FROM komentar WHERE comment = '$comment'"))['idkomen'];
$reply = $_POST['reply'];
$tanggal = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO balas (iduser, idkomen, reply, date) VALUES ('$iduser', '$idkomen','$reply', '$tanggal')");

if ($query) {
    echo "Balasan berhasil ditambahkan";
} else {
    echo "Gagal menambahkan balasan: " . mysqli_error($koneksi);
}
?>
