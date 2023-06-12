<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jancok";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function tambahData($nama, $mobile)
{
    global $conn;
    $query = "INSERT INTO nama_mobile (nama, mobile) VALUES ('$nama', '$mobile')";
    $conn->query($query);
}
?>
