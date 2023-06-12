<?php
include 'koneksi.php';

// Memeriksa apakah ada parameter yang diterima
if (isset($_POST['id']) && isset($_POST['nama']) && isset($_POST['mobile'])) {
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
    echo "Data tidak lengkap.";
}
?>
