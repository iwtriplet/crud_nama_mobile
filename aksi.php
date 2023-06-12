<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $mobile = $_POST['mobile'];

    tambahData($nama, $mobile);
}

header('Location: index.php');
?>
