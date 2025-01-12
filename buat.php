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
$username = $_SESSION['username'];
// Mendapatkan ID user dari username session
$iduser = mysqli_fetch_array(mysqli_query($koneksi, "SELECT iduser FROM user WHERE username = '$username'"))['iduser'];
// Menangkap data dari form
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $subjudul = $_POST['subtitle'];
    $konten = $_POST['konten'];
    $kategori = $_POST['kategori'];
    $tanggal = date('Y-m-d');
    $tags = $_POST['tags'];

    // Upload gambar
    if (isset($_FILES['gambar']['name'])) {
        $gambarName = $_FILES['gambar']['name'];
        $gambarTmpName = $_FILES['gambar']['tmp_name'];
        $gambarSize = $_FILES['gambar']['size'];
        $gambarError = $_FILES['gambar']['error'];
        $gambarType = $_FILES['gambar']['type'];

        // Validasi upload gambar
        if ($gambarError === 0) {
            if ($gambarSize <= 1024000) { // 1 MB
                $gambarDir = "dokumen/";
                $gambarUrl = $gambarDir . basename($gambarName);
                $gambarExt = pathinfo($gambarName, PATHINFO_EXTENSION);
                $allowedExts = ['jpg', 'jpeg', 'png'];

                if (in_array($gambarExt, $allowedExts)) {
                    // Upload gambar
                    if (move_uploaded_file($gambarTmpName, $gambarUrl)) {
                        // Simpan data artikel ke database
                        $query = mysqli_query($koneksi, "INSERT INTO artikel (iduser, idkategori, idtag, judul, subtitle, content,  file, type, size, tanggal) VALUES ('$iduser', '$kategori', '$tags','$judul', '$subjudul', '$konten','$gambarName', '$gambarType', '$gambarSize','$tanggal')");                     
                            
                            header('Location: form_writer.php?success=Artikel+berhasil+dibuat!');
                        } else {
                            echo '<div class="alert alert-danger">Gagal membuat artikel!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Gagal upload gambar!</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Format gambar tidak valid (jpg, jpeg, png, gif)!</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Ukuran gambar melebihi batas (1 MB)!</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Gagal upload gambar!</div>';
        }
    } else {
        // Simpan data artikel tanpa gambar
        $query = mysqli_query($koneksi, "INSERT INTO artikel (iduser, idkategori, judul, subjudul, konten, tanggal) VALUES ('$iduser', '$idkategori', '$judul', '$subjudul', '$konten', $tanggal')");
            if ($query) {
                header('Location: form_writer.php?success=Artikel+berhasil+dibuat!');
            } else {
                echo '<div class="alert alert-danger">Gagal membuat artikel!</div>';
            }
        }
?>