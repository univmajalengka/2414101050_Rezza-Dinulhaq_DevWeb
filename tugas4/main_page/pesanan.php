<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Paket Wisata</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container { max-width: 600px; margin: 100px auto; padding: 30px; background: #fff; box-shadow: 0 0 15px rgba(0,0,0,0.1); border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .checkbox-group label { display: block; margin-bottom: 5px; cursor: pointer; }
        .btn-submit { width: 100%; padding: 12px; background-color: var(--primary-color); color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 10px;}
        .btn-submit:hover { background-color: #003f7f; }
        .result-box { background: #f8f9fa; padding: 15px; margin-top: 20px; border-left: 5px solid var(--secondary-color); }
    </style>
</head>
<body>

    <header style="background: #333; padding: 15px; text-align: center; position:relative;">
        <a href="index.php" style="color: white; text-decoration: none; font-weight: bold;">&larr; Kembali ke Beranda</a>
    </header>

    <div class="form-container">
        <h2 style="text-align: center; margin-bottom: 20px; color: var(--primary-color);">Form Pemesanan</h2>
        
        <form action="proses_pesan.php" method="POST" onsubmit="return validateForm()">
            
            <div class="form-group">
                <label>Nama Pemesan:</label>
                <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label>Nomor HP/Telp:</label>
                <input type="tel" id="telp" name="telp" required placeholder="08...">
            </div>

            <div class="form-group">
                <label>Tanggal Pesan:</label>
                <input type="date" id="tanggal" name="tanggal" required>
            </div>

            <div class="form-group">
                <label>Durasi (Hari):</label>
                <input type="number" id="waktu" name="waktu" min="1" value="1" oninput="hitungTotal()">
            </div>

            <div class="form-group">
                <label>Jumlah Peserta:</label>
                <input type="number" id="peserta" name="peserta" min="1" value="1" oninput="hitungTotal()">
            </div>

            <div class="form-group">
                <label style="margin-bottom: 10px; display:block;">Pilih Layanan / Paket:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" id="srv_tenda" name="layanan[]" value="Tenda" onclick="hitungTotal()"> Tenda Dome 4P (Rp 50.000)</label>
                    <label><input type="checkbox" id="srv_sleeping" name="layanan[]" value="Sleeping Bag" onclick="hitungTotal()"> Sleeping Bag (Rp 15.000)</label>
                    <label><input type="checkbox" id="srv_masak" name="layanan[]" value="Paket Masak" onclick="hitungTotal()"> Paket Masak (Rp 25.000)</label>
                    <hr style="margin: 5px 0; border: 0; border-top: 1px dashed #ccc;">
                    <label><input type="checkbox" id="srv_kawah" name="layanan[]" value="Kawah Putih" onclick="hitungTotal()"> Tiket Kawah Putih (Rp 31.000)</label>
                    <label><input type="checkbox" id="srv_orchid" name="layanan[]" value="Orchid Forest" onclick="hitungTotal()"> Tiket Orchid Forest (Rp 40.000)</label>
                    <label><input type="checkbox" id="srv_sunrise" name="layanan[]" value="Sunrise Point" onclick="hitungTotal()"> Tiket Sunrise Cukul (Rp 15.000)</label>
                </div>
            </div>

            <div class="result-box">
                <p>Harga Paket (Per Orang/Item): <strong>Rp <span id="harga_paket">0</span></strong></p>
                <p>Total Tagihan: <strong>Rp <span id="total_tagihan">0</span></strong></p>
                <small><em>Rumus: Durasi x Peserta x Total Harga Layanan</em></small>
            </div>

            <input type="hidden" name="harga_paket_value" id="harga_paket_value">
            
            <button type="submit" class="btn-submit">Simpan Pesanan</button>
        </form>
    </div>

    <script>
        function hitungTotal() {
            let waktu = parseInt(document.getElementById('waktu').value) || 0;
            let peserta = parseInt(document.getElementById('peserta').value) || 0;
            
            // Logika Harga Javascript
            let totalLayanan = 0;
            if(document.getElementById('srv_tenda').checked) totalLayanan += 50000;
            if(document.getElementById('srv_sleeping').checked) totalLayanan += 15000;
            if(document.getElementById('srv_masak').checked) totalLayanan += 25000;
            if(document.getElementById('srv_kawah').checked) totalLayanan += 31000;
            if(document.getElementById('srv_orchid').checked) totalLayanan += 40000;
            if(document.getElementById('srv_sunrise').checked) totalLayanan += 15000;

            let totalTagihan = waktu * peserta * totalLayanan;

            document.getElementById('harga_paket').innerText = new Intl.NumberFormat('id-ID').format(totalLayanan);
            document.getElementById('total_tagihan').innerText = new Intl.NumberFormat('id-ID').format(totalTagihan);
            document.getElementById('harga_paket_value').value = totalLayanan;
        }

        function validateForm() {
            let nama = document.getElementById('nama').value;
            let layanan = document.querySelectorAll('input[name="layanan[]"]:checked');
            if (nama == "") { alert("Nama pemesan harus diisi!"); return false; }
            if (layanan.length === 0) { alert("Pilih minimal satu layanan!"); return false; }
            return true;
        }
    </script>
</body>
</html>