<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('login.php');
    exit;
}
include "koneksi.php";
$artikelId = $_GET['id'];
$queryArtikel = mysqli_query($koneksi, "DELETE FROM artikel WHERE idartikel = '$artikelId'");

if ($queryArtikel) {
    header('Location: form_writer.php?success=Artikel+berhasil+dihapus!');
} else {
    // Handle deletion failure (e.g., display an error message)
    echo '<div class="alert alert-danger">Gagal menghapus artikel!</div>';
}
?>