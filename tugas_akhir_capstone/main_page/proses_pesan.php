<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil Data
    $nama = htmlspecialchars($_POST['nama']);
    $telp = htmlspecialchars($_POST['telp']);
    $tanggal = $_POST['tanggal'];
    $waktu = (int) $_POST['waktu'];
    $peserta = (int) $_POST['peserta'];
    
    // Cek apakah ini mode EDIT (punya ID) atau BARU
    $id_pesanan = isset($_POST['id_pesanan']) ? $_POST['id_pesanan'] : null;

    // 2. Hitung Harga (Sama persis logikanya)
    $layanan_arr = isset($_POST['layanan']) ? $_POST['layanan'] : [];
    $layanan_str = implode(", ", $layanan_arr); 

    $harga_satuan = 0;
    if (in_array("Tenda", $layanan_arr)) $harga_satuan += 50000;
    if (in_array("Sleeping Bag", $layanan_arr)) $harga_satuan += 15000;
    if (in_array("Paket Masak", $layanan_arr)) $harga_satuan += 25000;
    if (in_array("Kawah Putih", $layanan_arr)) $harga_satuan += 31000;
    if (in_array("Orchid Forest", $layanan_arr)) $harga_satuan += 40000;
    if (in_array("Sunrise Point", $layanan_arr)) $harga_satuan += 15000;

    $total_tagihan = $waktu * $peserta * $harga_satuan;

    // 3. Eksekusi Query
    if ($id_pesanan) {
        // --- JIKA ADA ID, MAKA UPDATE ---
        $query = "UPDATE pesanan SET 
                    nama_pemesan = '$nama', nomor_hp = '$telp', tanggal_pesan = '$tanggal', 
                    waktu_perjalanan = '$waktu', jumlah_peserta = '$peserta', 
                    layanan_pilihan = '$layanan_str', harga_paket = '$harga_satuan', 
                    jumlah_tagihan = '$total_tagihan' 
                  WHERE id = '$id_pesanan'";
        $pesan_sukses = "Data Berhasil Diperbarui!";
    } else {
        // --- JIKA TIDAK ADA ID, MAKA INSERT (BARU) ---
        $query = "INSERT INTO pesanan (nama_pemesan, nomor_hp, tanggal_pesan, waktu_perjalanan, jumlah_peserta, layanan_pilihan, harga_paket, jumlah_tagihan) 
                  VALUES ('$nama', '$telp', '$tanggal', '$waktu', '$peserta', '$layanan_str', '$harga_satuan', '$total_tagihan')";
        $pesan_sukses = "Pesanan Berhasil Disimpan!";
    }

    // Jalankan Query
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('$pesan_sukses Total: Rp " . number_format($total_tagihan,0,',','.') . "');
                window.location.href = 'modifikasi_pesanan.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    header("Location: index.php");
}
?>