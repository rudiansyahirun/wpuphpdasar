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

    // upload image from gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    // query to insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";

    // execute query
    mysqli_query($db, $query);

    // return result
    return mysqli_affected_rows($db);
}

// function to upload image
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // check if there is an error
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // check if the uploaded file is an image
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile); // to get the extension of the file
    $ekstensiGambar = strtolower(end($ekstensiGambar)); // to make the extension lowercase and to get the last element of the array
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) { // to check if the extension is invalid
        echo "<script>
                alert('yang anda pilih bukan gambar!');
            </script>";
        return false;
    }

    // check if the file size is too big
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // generate a random name for the file
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // move the file to the folder
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // check if the image is changed
    if ($_FILES['gambar']['error'] === 4) { // if there is no image uploaded
        $gambar = $gambarLama;
    } else { // if there is an image uploaded
        $gambar = upload(); // run the function to upload the image
    }

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


// function to search data in table
function cari($keyword) {
    $query = "SELECT * FROM mahasiswa 
            WHERE 
                  nama LIKE '%$keyword%' OR 
                  nrp LIKE '%$keyword%' OR 
                  email LIKE '%$keyword%' OR 
                  jurusan LIKE '%$keyword%'";
    return query($query);
}

?>