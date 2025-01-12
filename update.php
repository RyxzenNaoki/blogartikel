<?php
// Menginclude koneksi database
include "koneksi.php";

// Memulai session
session_start();

// Memeriksa apakah pengguna memiliki akses untuk mengedit artikel
if (!isset($_SESSION['username'])) {
    header('login.php');
    exit;
}

// Mendapatkan data artikel dari form
$idartikel = $_POST['id'];
$judul = $_POST['judul'];
$subjudul = $_POST['subtitle'];
$konten = $_POST['konten'];
$kategori = $_POST['kategori'];
$tanggal = date('Y-m-d');
$tags = $_POST['tags'];

// Validasi data
if (empty($judul) || empty($subjudul) || empty($konten) || empty($kategori) || empty($tags)) {
    echo '<div class="alert alert-danger">Semua field harus diisi!</div>';
    exit;
}

// Upload gambar (opsional)
if (isset($_FILES['gambar']['name'])) {
    $gambarName = $_FILES['gambar']['name'];
    $gambarTmpName = $_FILES['gambar']['tmp_name'];
    $gambarSize = $_FILES['gambar']['size'];
    $gambarError = $_FILES['gambar']['error'];
    $gambarType = $_FILES['gambar']['type'];

    if ($gambarError === 0) {
        if ($gambarSize <= 1024000) { // 1 MB
            $gambarDir = "dokumen/";
            $gambarUrl = $gambarDir . basename($gambarName);
            $gambarExt = pathinfo($gambarName, PATHINFO_EXTENSION);
            $allowedExts = ['jpg', 'jpeg', 'png'];

            if (in_array($gambarExt, $allowedExts)) {
                if (move_uploaded_file($gambarTmpName, $gambarUrl)) {
                    // Hapus gambar sebelumnya (jika ada)
                    $queryGambarLama = mysqli_query($koneksi, "SELECT file FROM artikel WHERE idartikel = '$idartikel'");
                    $gambarLamaData = mysqli_fetch_array($queryGambarLama);
                    $gambarLamaFile = $gambarLamaData['file'];
                    if ($gambarLamaFile && file_exists("dokumen/" . $gambarLamaFile)) {
                        unlink("dokumen/" . $gambarLamaFile);
                    }

                    // Update data artikel dengan gambar baru
                    $queryUpdate = "UPDATE artikel SET idkategori = '$kategori', idtag = '$tags', judul = '$judul', subtitle = '$subjudul', content = '$konten', file = '$gambarName', type = '$gambarType', size = '$gambarSize', tanggal = '$tanggal' WHERE idartikel = '$idartikel'";
                    $a = $koneksi->query($queryUpdate);

                    header('Location: form_writer.php?success=Artikel+berhasil+diupdate!');

                    if (!$a) {
                        echo '<div class="alert alert-danger">Gagal Update Artikel!</div>';
                        exit;
                    } 
                } else {
                    echo '<div class="alert alert-danger">Gagal mengunggah gambar!</div>';
                    exit;
                }
            } else {
                echo '<div class="alert alert-danger">Format gambar tidak valid!</div>';
                exit;
            }
        } else {
            echo '<div class="alert alert-danger">Ukuran gambar melebihi batas (maks. 1 MB)!</div>';
            exit;
        }
    }
} else {
    // Gunakan gambar lama
    $queryGambar = mysqli_query($koneksi, "SELECT file, type, size FROM artikel WHERE idartikel = '$idartikel'");
    $gambarData = mysqli_fetch_array($queryGambar);
    $gambarName = $gambarData['file']; // Gunakan nama gambar lama
    $gambarType = $gambarData['type']; // Gunakan nama gambar lama
    $gambarSize = $gambarData['size']; // Gunakan nama gambar lama

    // Update data artikel dengan gambar lama
    $queryUpdate = "UPDATE artikel SET idkategori = '$kategori', idtag = '$tags', judul = '$judul', subtitle = '$subjudul', content = '$konten', file = '$gambarName', type = '$gambarType', size = '$gambarSize', tanggal = '$tanggal' WHERE idartikel = '$idartikel'";
    $a = $koneksi->query($queryUpdate);
    header('Location: form_writer.php?success=Artikel+berhasil+diupdate!');
    if (!$a) {
        echo '<div class="alert alert-danger">Gagal Update Artikel!</div>';
        exit;
    } 
}

?>
