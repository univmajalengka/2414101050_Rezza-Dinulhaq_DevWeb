<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Siswa Baru</title>
</head>
<body>
    <h3>Formulir Pendaftaran Siswa Baru</h3>

    <form action="proses-pendaftaran-2.php" method="POST">
        <p>
            <label>Nama: </label>
            <input type="text" name="nama" required>
        </p>
        <p>
            <label>Alamat: </label>
            <textarea name="alamat" required></textarea>
        </p>
        <p>
            <label>Jenis Kelamin: </label>
            <input type="radio" name="jenis_kelamin" value="L"> Laki-laki
            <input type="radio" name="jenis_kelamin" value="P"> Perempuan
        </p>
        <p>
            <label>Agama: </label>
            <select name="agama" required>
                <option>Islam</option>
                <option>Kristen</option>
                <option>Hindu</option>
                <option>Buddha</option>
                <option>Konghucu</option>
            </select>
        </p>
        <p>
            <label>Sekolah Asal: </label>
            <input type="text" name="sekolah_asal" required>
        </p>

        <p>
            <input type="submit" value="Daftar">
        </p>
    </form>

</body>
</html>
