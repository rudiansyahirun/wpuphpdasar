<?php
// load db from functions.php
require 'functions.php';

// get id from url
$id = $_GET['id'];

// take from table mahasiswa as mhs
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// check if button submit is clicked
if (isset($_POST["submit"])) {

    // check if data is filled
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else { // if data is not filled
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>

<h1>Ubah Data Mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
<!--input hiden id-->
    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">   <!--input hiden id-->
    <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>"> <!--input hiden gambar lama-->

    <ul>
        <li>
            <label for="nrp">NRP :</label>
            <input type="text" name="nrp" id="nrp" required
                   value="<?= $mhs['nrp']; ?>">
        </li>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" required
                   value="<?= $mhs['nama']; ?>">
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required
                   value="<?= $mhs['email']; ?>">
        </li>
        <li>
            <label for="jurusan">Jurusan :</label>
            <input type="text" name="jurusan" id="jurusan" required
                   value="<?= $mhs['jurusan']; ?>">
        </li>
        <li>
            <label for="gambar">Gambar :</label>
            <img src="img/<?= $mhs['gambar']; ?>" alt="" width="40">
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data</button>
        </li>
    </ul>
</form>

</body>
</html>