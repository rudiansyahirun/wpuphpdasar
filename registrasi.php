<?php

// load db from functions.php
require 'functions.php';

// check if post register is clicked
if (isset($_POST["register"])) {
    // check if data is filled
    if (registrasi($_POST) > 0) { // if data is filled
        echo "
            <script>
                alert('User baru berhasil ditambahkan!');
//                document.location.href = 'login.php';
            </script>
        ";
    } else { // if data is not filled
        echo mysqli_error($db);
//        echo "
//            <script>
//                alert('Data gagal ditambahkan!');
//                document.location.href = 'login.php';
//            </script>
//        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>