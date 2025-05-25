<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

// Proses pencarian
$search = isset($_GET['search']) ? trim($_GET['search']) : "";

if ($search !== "") {
    $stmt = $conn->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ?");
    $like = "%$search%";
    $stmt->bind_param("s", $like);
} else {
    $stmt = $conn->prepare("SELECT * FROM t_dosen");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Dosen</title>
    <link rel="stylesheet" href="viewdosen.css">
    <style>
        table { width: 80%; margin: 20px auto; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; }
        .btn-edit { background-color: #4CAF50; color: white; }
        .btn-delete { background-color: #f44336; color: white; }
        .center { text-align: center; margin: 20px; }
    </style>
</head>
<body>

    <h1 style="text-align:center;">Data Dosen</h1>

    <div class="center">
        <a href="input.php">+ Tambah Data</a>
    </div>

    <form action="viewdosen.php" method="get" style="text-align:center; margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Cari nama dosen..." value="<?php echo htmlspecialchars($search); ?>">
        <input type="submit" value="Cari">
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>ID Dosen</th>
            <th>Nama Dosen</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>" . htmlspecialchars($row['idDosen']) . "</td>
                        <td>" . htmlspecialchars($row['namaDosen']) . "</td>
                        <td>" . htmlspecialchars($row['noHP']) . "</td>
                        <td>
                            <a class='btn btn-edit' href='editdosen.php?idDosen=" . urlencode($row['idDosen']) . "'>Edit</a>
                            <a class='btn btn-delete' href='hapusdosen.php?id=" . urlencode($row['idDosen']) . "' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                    </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='5'>Data tidak ditemukan.</td></tr>";
        }
        $stmt->close();
        ?>
    </table>

</body>
</html>
