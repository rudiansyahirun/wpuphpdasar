<?php

// load db from functions.php
require 'functions.php';

// check if hapus is clicked
if (isset($_GET['id'])) {
    // get id from url
    $id = $_GET['id'];
    // delete data from table mahasiswa
    if (hapus($id) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>