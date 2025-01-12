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