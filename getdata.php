<?php
include 'koneksi.php';

// Query untuk mengambil semua data dari tabel nama_mobile
$query = "SELECT * FROM nama_mobile";
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
