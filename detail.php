<?php
include 'koneksi.php';

// Periksa apakah ada parameter ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = "SELECT * FROM nama_mobile WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Mengembalikan data dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        // ID tidak ditemukan
        header('HTTP/1.0 404 Not Found');
        echo "Data tidak ditemukan.";
    }
} else {
    // Parameter ID tidak ditemukan
    header('HTTP/1.0 400 Bad Request');
    echo "Parameter ID tidak ditemukan.";
}
?>
