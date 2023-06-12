<?php
include 'koneksi.php';

// Memeriksa apakah ada parameter yang diterima
if (isset($_POST['nama']) && isset($_POST['mobile'])) {
    $nama = $_POST['nama'];
    $mobile = $_POST['mobile'];

    // Query untuk menambahkan data baru ke tabel nama_mobile
    $query = "INSERT INTO nama_mobile (nama, mobile) VALUES ('$nama', '$mobile')";
    $result = $conn->query($query);

    if ($result === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data. Error: " . $conn->error;
    }
} else {
    echo "Data tidak lengkap.";
}
?>
