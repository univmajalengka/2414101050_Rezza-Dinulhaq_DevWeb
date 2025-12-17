<?php
include 'koneksi.php';

// Cek jika tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dan amankan input
    $nama = htmlspecialchars($_POST['nama']);
    $telp = htmlspecialchars($_POST['telp']);
    $tanggal = $_POST['tanggal'];
    $waktu = (int) $_POST['waktu'];
    $peserta = (int) $_POST['peserta'];

    // Menangani Checkbox Layanan
    $layanan_arr = isset($_POST['layanan']) ? $_POST['layanan'] : [];
    $layanan_str = implode(", ", $layanan_arr); 

    // --- HITUNG ULANG DI SERVER ---
    $harga_satuan = 0;
    
    // Logika Harga PHP (Harus sama dengan Javascript)
    if (in_array("Tenda", $layanan_arr)) $harga_satuan += 50000;
    if (in_array("Sleeping Bag", $layanan_arr)) $harga_satuan += 15000;
    if (in_array("Paket Masak", $layanan_arr)) $harga_satuan += 25000;
    if (in_array("Kawah Putih", $layanan_arr)) $harga_satuan += 31000;
    if (in_array("Orchid Forest", $layanan_arr)) $harga_satuan += 40000;
    if (in_array("Sunrise Point", $layanan_arr)) $harga_satuan += 15000;

    // Hitung Total Tagihan
    $total_tagihan = $waktu * $peserta * $harga_satuan;

    // --- QUERY INSERT ---
    $query = "INSERT INTO pesanan (nama_pemesan, nomor_hp, tanggal_pesan, waktu_perjalanan, jumlah_peserta, layanan_pilihan, harga_paket, jumlah_tagihan) 
              VALUES ('$nama', '$telp', '$tanggal', '$waktu', '$peserta', '$layanan_str', '$harga_satuan', '$total_tagihan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Pesanan Berhasil Disimpan! Total Tagihan: Rp " . number_format($total_tagihan,0,',','.') . "');
                window.location.href = 'modifikasi_pesanan.php';
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    // PERBAIKAN: Jika akses langsung tanpa form, lempar ke index.php
    header("Location: index.php");
}
?>