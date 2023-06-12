<?php
include 'koneksi.php';

$id = $_GET['id'];

hapusData($id);

header('Location: index.php');
?>
