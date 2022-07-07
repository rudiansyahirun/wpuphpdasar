<?php
// load db from functions.php
require 'functions.php';
// take from table mahasiswa
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Halaman Admin</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($mahasiswa as $mhs): ?>
    <tr>
        <td><?= $i;?></td>
        <td>
            <a href="ubah.php?id=<?= $mhs['id'];?>">Edit</a> |
            <a href="hapus.php?id=<?= $mhs['id'];?>" onclick="return confirm('Yakin?')">Delete</a>
        </td>
        <td><img src="img/<?= $mhs['gambar'];?>" width="50"></td>
        <td><?= $mhs['nrp'];?></td>
        <td><?= $mhs['nama'];?></td>
        <td><?= $mhs['email'];?></td>
        <td><?= $mhs['jurusan'];?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</body>
</html>