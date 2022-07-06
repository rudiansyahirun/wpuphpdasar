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
?>