<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

// Proses pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM t_mahasiswa";
if (!empty($search)) {
    $query .= " WHERE namaMhs LIKE ?";
    $stmt = $conn->prepare($query);
    $like = "%$search%";
    $stmt->bind_param("s", $like);
} else {
    $stmt = $conn->prepare($query);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="viewmahasiswa.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

    <h1>Data Mahasiswa</h1>

    <!-- Form Search -->
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Cari berdasarkan nama..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Cari">
    </form>

    <!-- Tombol Tambah Data -->
    <div class="center">
        <a class="tambah-btn" href="input_mahasiswa.php">+ Tambah Data</a>
    </div>

    <!-- Tabel Mahasiswa -->
    <table>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['npm']}</td>
                    <td>{$row['namaMhs']}</td>
                    <td>{$row['prodi']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['noHP']}</td>
                    <td>
                        <a class='btn btn-edit' href='editmahasiswa.php?npm={$row['npm']}'>Edit</a>
                        <a class='btn btn-delete' href='hapusmahasiswa.php?id={$row['npm']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                    </td>
                </tr>";
            $no++;
        }
        $stmt->close();
        ?>
    </table>

</body>
</html>
