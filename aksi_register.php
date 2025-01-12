<?php
include "koneksi.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$level = $_POST['level'];
$email = $_POST['email'];

// Insert schedule data
$sql = "INSERT INTO user (username, password, email, level) VALUES ('".$user."', '".$psw."', '".$email."', '".$level."')";
$query = $koneksi->query($sql);

if ($query === true) {
    header('location: login.php');
} else {
    echo "Error" . mysqli_error($koneksi);
}
?>