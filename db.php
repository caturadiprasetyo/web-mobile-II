<?php
$servername = "localhost";  // Nama host database (biasanya localhost)
$username = "root";         // Username database
$password = "";             // Password database (kosong jika belum diset)
$dbname = "catur";      // Nama database yang Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
