<?php
include 'koneksi.php';

// Periksa apakah ada parameter ID
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $mobile = $_POST['mobile'];

    // Query untuk memperbarui data berdasarkan ID
    $query = "UPDATE nama_mobile SET nama='$nama', mobile='$mobile' WHERE id=$id";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data. Error: " . $conn->error;
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}
?>
