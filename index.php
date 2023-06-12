<!DOCTYPE html>
<html>
<head>
    <title>CRUD Nama dan Mobile - Daftar Data</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        form label {
            margin-bottom: 5px;
        }

        form input {
            margin-bottom: 10px;
            padding: 5px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    include 'koneksi.php';

    // Periksa apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $mobile = $_POST['mobile'];

        // Query untuk menambahkan data
        $query = "INSERT INTO nama_mobile (nama, mobile) VALUES ('$nama', '$mobile')";
        $result = $conn->query($query);

        if ($result === TRUE) {
            echo "Data berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan data. Error: " . $conn->error;
        }
    }

    // Periksa apakah ada parameter ID untuk menghapus data
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk menghapus data
        $query = "DELETE FROM nama_mobile WHERE id = $id";
        $result = $conn->query($query);

        if ($result === TRUE) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Gagal menghapus data. Error: " . $conn->error;
        }
    }

    // Ambil data dari database
    $query = "SELECT * FROM nama_mobile";
    $result = $conn->query($query);
    ?>

    <h2>Daftar Data</h2>

    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="mobile">Mobile:</label>
        <input type="text" name="mobile" id="mobile" required>

        <input type="submit" value="Tambah Data">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Mobile</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['mobile'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='index.php?id=" . $row['id'] . "&aksi=hapus'>Hapus</a> | <a href='detail.php?id=" . $row['id'] . "'>Detail</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
