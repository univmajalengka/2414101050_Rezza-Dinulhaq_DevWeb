# Dokumentasi Deteksi & Perbaikan Error – Tugas 3

## 1. Error: Undefined Variable

- **File**: proses-pendaftaran-2.php
- **Baris**: bagian pemrosesan form
- **Pesan Error**: Undefined index / undefined variable
- **Penyebab**: Variabel diakses sebelum dicek `isset()` atau sebelum `POST` dikirim
- **Perbaikan**: Menambahkan pengecekan `$_SERVER["REQUEST_METHOD"] == "POST"`

---

## 2. Error: SQL Injection Risk

- **File**: proses-pendaftaran-2.php
- **Pesan**: Tidak ada, namun berpotensi sangat berbahaya
- **Penyebab**: Kode menggunakan query mentah `mysqli_query()`
- **Perbaikan**: Mengganti seluruh query dengan _prepared statements_

---

## 3. Error: Syntax Error

- **File**: koneksi.php
- **Pesan**: Parse error; unexpected ‘;’
- **Penyebab**: Penulisan variabel tidak lengkap
- **Perbaikan**: Menggunakan format baru dengan `new mysqli()`

---

## 4. Error: Form tidak menyimpan ke database

- **File**: proses-pendaftaran-2.php
- **Penyebab**: Query gagal dieksekusi, tidak ada pengecekan error
- **Perbaikan**: Menambahkan `$stmt->execute()` dan pengecekan hasil

---

# Hasil Akhir

✔ Program berjalan  
✔ Data tersimpan di database  
✔ Redirect ke `index.php?status=sukses` berhasil  
✔ Semua file mengikuti best practices
