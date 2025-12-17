<?php
include 'koneksi.php';

// --- LOGIKA HAPUS DATA ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query_hapus = "DELETE FROM pesanan WHERE id = '$id'";
    if (mysqli_query($conn, $query_hapus)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='modifikasi_pesanan.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan Wisata</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container-admin { max-width: 1200px; margin: 80px auto; padding: 20px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; font-size: 0.9rem; }
        th { background-color: var(--primary-color); color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-action { text-decoration: none; padding: 5px 10px; border-radius: 4px; color: white; font-size: 0.8rem; margin-right: 5px;}
        .btn-delete { background-color: #e74c3c; }
        .header-admin { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 10px;}
    </style>
</head>
<body>

    <header style="background: #333; padding: 15px;">
        <div class="navbar" style="padding: 0; max-width: 100%;">
            <a href="index.php" style="color: white; font-weight: bold;">&larr; Ke Website Utama</a>
            <a href="pesanan.php" style="color: var(--secondary-color); font-weight: bold;">+ Tambah Pesanan</a>
        </div>
    </header>

    <div class="container-admin">
        <div class="header-admin">
            <h2>Daftar Pesanan Masuk</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Tgl</th>
                    <th>Durasi</th>
                    <th>Pax</th>
                    <th>Layanan</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM pesanan ORDER BY id DESC";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $tagihan = "Rp " . number_format($row['jumlah_tagihan'], 0, ',', '.');
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nomor_hp']) . "</td>";
                        echo "<td>" . $row['tanggal_pesan'] . "</td>";
                        echo "<td>" . $row['waktu_perjalanan'] . " Hari</td>";
                        echo "<td>" . $row['jumlah_peserta'] . " Org</td>";
                        echo "<td>" . htmlspecialchars($row['layanan_pilihan']) . "</td>";
                        echo "<td style='font-weight:bold; color:green;'>" . $tagihan . "</td>";
                        echo "<td>
                                <a href='modifikasi_pesanan.php?hapus=" . $row['id'] . "' 
                                   class='btn-action btn-delete' 
                                   onclick='return confirm(\"Yakin hapus data " . $row['nama_pemesan'] . "?\");'>
                                   Hapus
                                </a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' style='text-align:center;'>Belum ada data pesanan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>