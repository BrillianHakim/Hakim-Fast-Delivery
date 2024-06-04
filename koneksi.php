<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "hakiemdeliveryform";

// Membuat koneksi ke database menggunakan mysqli
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
} 
?>
