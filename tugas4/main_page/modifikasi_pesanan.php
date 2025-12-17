<?php
include 'koneksi.php';

// --- LOGIKA 1: HAPUS DATA ---
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pesanan WHERE id = '$id'");
    echo "<script>alert('Data berhasil dihapus!'); window.location='modifikasi_pesanan.php';</script>";
}

// --- LOGIKA 2: AMBIL DATA EDIT ---
$edit_mode = false;
$data_edit = [];
$layanan_checked = [];

if (isset($_GET['edit'])) {
    $id_edit = $_GET['edit'];
    $query_edit = "SELECT * FROM pesanan WHERE id = '$id_edit'";
    $result_edit = mysqli_query($conn, $query_edit);
    if ($row_edit = mysqli_fetch_assoc($result_edit)) {
        $edit_mode = true;
        $data_edit = $row_edit;
        // Pecah string layanan jadi array (misal: "Tenda, Sleeping Bag" -> ["Tenda", "Sleeping Bag"])
        $layanan_checked = explode(", ", $data_edit['layanan_pilihan']);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pesanan Wisata</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container-admin { max-width: 1200px; margin: 80px auto; padding: 20px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        /* Style Tabel */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; font-size: 0.9rem; }
        th { background-color: var(--primary-color); color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        
        /* Style Tombol */
        .btn-action { text-decoration: none; padding: 5px 10px; border-radius: 4px; color: white; font-size: 0.8rem; margin-right: 5px; display:inline-block;}
        .btn-delete { background-color: #e74c3c; }
        .btn-edit { background-color: #3498db; }
        
        /* Style Form Edit (minjam dari pesanan.php) */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .btn-submit { padding: 10px 20px; background-color: #27ae60; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .btn-cancel { padding: 10px 20px; background-color: #7f8c8d; color: white; border: none; border-radius: 4px; text-decoration: none; }
    </style>
</head>
<body>

    <header style="background: #333; padding: 15px;">
        <div class="navbar" style="padding: 0; max-width: 100%;">
            <a href="index.php" style="color: white; font-weight: bold;">&larr; Ke Website Utama</a>
            <a href="pesanan.php" style="color: var(--secondary-color); font-weight: bold; margin-left: 20px;">+ Tambah Pesanan Baru</a>
        </div>
    </header>

    <div class="container-admin">
        
        <?php if ($edit_mode): ?>
            <div class="header-admin">
                <h2>Edit Data Pesanan: <?php echo $data_edit['nama_pemesan']; ?></h2>
            </div>
            
            <form action="proses_pesan.php" method="POST">
                <input type="hidden" name="id_pesanan" value="<?php echo $data_edit['id']; ?>"> <div class="form-group">
                    <label>Nama Pemesan:</label>
                    <input type="text" name="nama" value="<?php echo $data_edit['nama_pemesan']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Nomor HP:</label>
                    <input type="text" name="telp" value="<?php echo $data_edit['nomor_hp']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Tanggal:</label>
                    <input type="date" name="tanggal" value="<?php echo $data_edit['tanggal_pesan']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Durasi (Hari):</label>
                    <input type="number" name="waktu" value="<?php echo $data_edit['waktu_perjalanan']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Peserta:</label>
                    <input type="number" name="peserta" value="<?php echo $data_edit['jumlah_peserta']; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Layanan (Centang ulang jika ingin mengubah):</label>
                    <label><input type="checkbox" name="layanan[]" value="Tenda" <?php if(in_array("Tenda", $layanan_checked)) echo "checked"; ?>> Tenda</label>
                    <label><input type="checkbox" name="layanan[]" value="Sleeping Bag" <?php if(in_array("Sleeping Bag", $layanan_checked)) echo "checked"; ?>> Sleeping Bag</label>
                    <label><input type="checkbox" name="layanan[]" value="Paket Masak" <?php if(in_array("Paket Masak", $layanan_checked)) echo "checked"; ?>> Paket Masak</label>
                    <label><input type="checkbox" name="layanan[]" value="Kawah Putih" <?php if(in_array("Kawah Putih", $layanan_checked)) echo "checked"; ?>> Kawah Putih</label>
                    <label><input type="checkbox" name="layanan[]" value="Orchid Forest" <?php if(in_array("Orchid Forest", $layanan_checked)) echo "checked"; ?>> Orchid Forest</label>
                    <label><input type="checkbox" name="layanan[]" value="Sunrise Point" <?php if(in_array("Sunrise Point", $layanan_checked)) echo "checked"; ?>> Sunrise Point</label>
                </div>

                <button type="submit" class="btn-submit">Simpan Perubahan</button>
                <a href="modifikasi_pesanan.php" class="btn-cancel">Batal</a>
            </form>

        <?php else: ?>
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
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM pesanan ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nomor_hp']) . "</td>";
                        echo "<td>" . $row['tanggal_pesan'] . "</td>";
                        echo "<td>" . $row['waktu_perjalanan'] . " Hari</td>";
                        echo "<td>" . $row['jumlah_peserta'] . " Org</td>";
                        echo "<td><small>" . htmlspecialchars($row['layanan_pilihan']) . "</small></td>";
                        echo "<td style='color:green; font-weight:bold;'>Rp " . number_format($row['jumlah_tagihan'], 0, ',', '.') . "</td>";
                        echo "<td>
                                <a href='modifikasi_pesanan.php?edit=" . $row['id'] . "' class='btn-action btn-edit'>Edit</a>
                                <a href='modifikasi_pesanan.php?hapus=" . $row['id'] . "' class='btn-action btn-delete' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</body>
</html>