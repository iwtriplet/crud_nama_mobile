<?php
include 'koneksi.php';

// Memeriksa apakah ada parameter yang diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil detail data berdasarkan ID
    $query = "SELECT * FROM nama_mobile WHERE id=$id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        // Mengembalikan data dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}
?>
