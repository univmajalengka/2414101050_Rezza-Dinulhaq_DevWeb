<?php
$host = "localhost";
$user = "root";
$pass = ""; // Sesuaikan password database (kosongkan jika XAMPP default)
$db   = "wisata_bdg";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>