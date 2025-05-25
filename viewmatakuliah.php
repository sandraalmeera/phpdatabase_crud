<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

// Ambil keyword pencarian jika ada
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

// Query dengan kondisi search
if ($keyword != '') {
    $stmt = $conn->prepare("SELECT * FROM t_matakuliah WHERE namaMK LIKE ?");
    $searchTerm = "%$keyword%";
    $stmt->bind_param("s", $searchTerm);
} else {
    $stmt = $conn->prepare("SELECT * FROM t_matakuliah");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" type="text/css" href="viewmatakuliah.css">
</head>
<body>
    <h2>Data Mata Kuliah</h2>

    <div class="center">
        <a href="input_matakuliah.php" class="btn-add">+ Tambah Data</a>
    </div>

    <form method="get" action="viewmatakuliah.php" class="search-form">
        <input type="text" name="keyword" placeholder="Cari Nama Mata Kuliah..." value="<?php echo htmlspecialchars($keyword); ?>" />
        <input type="submit" value="Cari" />
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Kode MK</th>
            <th>Nama MK</th>
            <th>SKS</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['kodeMK']}</td>
                        <td>{$row['namaMK']}</td>
                        <td>{$row['sks']}</td>
                        <td>{$row['jam']}</td>
                        <td>
                            <a href='editmatakuliah.php?kodeMK={$row['kodeMK']}' class='btn btn-edit'>Edit</a>
                            <a href='hapusmatakuliah.php?id={$row['kodeMK']}' class='btn btn-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                    </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Data tidak ditemukan</td></tr>";
        }
        $stmt->close();
        ?>
    </table>
</body>
</html>
