<?php
// connect to database wpuphpdasar
$db = mysqli_connect("localhost", "root", "RudiSQLoioi1!", "wpuphpdasar");

// function to take data from table
function query($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// function to add data to table
function tambah($data) {
    global $db; // to use $db from global scope

    // to take data from form
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query to insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";

    // execute query
    mysqli_query($db, $query);

    // return result
    return mysqli_affected_rows($db);
}


// function to delete data from table
function hapus($id) {
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($db);
}


// function to update data in table
function ubah($data) {
    global $db;

    // to take data from form
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // query to update data
    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = $id";

    // execute query
    mysqli_query($db, $query);

    // return result
    return mysqli_affected_rows($db);
}

?>