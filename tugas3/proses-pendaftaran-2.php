<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama          = $_POST['nama'];
    $alamat        = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama         = $_POST['agama'];
    $sekolah_asal  = $_POST['sekolah_asal'];

    // Prepared Statement
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $koneksi->prepare($sql);

    if (!$stmt) {
        die("Prepare gagal: " . $koneksi->error);
    }

    $stmt->bind_param("sssss", $nama, $alamat, $jenis_kelamin, $agama, $sekolah_asal);

    if ($stmt->execute()) {
        header("Location: index.php?status=sukses");
        exit;
    } else {
        header("Location: index.php?status=gagal");
        exit;
    }

} else {
    die("Akses dilarang...");
}
?>
