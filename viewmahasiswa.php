<?php
include 'koneksi.php';  // koneksi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="viewmahasiswa.css" />
</head>
<body>

    <h1>Tabel Mahasiswa</h1>

    <div class="center">
        <a href="input_mahasiswa.php">Input Data Mahasiswa</a>
    </div>

    <!-- Form Search -->
    <form method="GET" action="">
        <input type="text" name="keyword" placeholder="Cari nama mahasiswa..." 
            value="<?php if (isset($_GET['keyword'])) echo htmlspecialchars($_GET['keyword']); ?>">
        <input type="submit" value="Cari">
    </form>

    <table>
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Program Studi</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
<?php
// Ambil keyword pencarian
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
}

// Query dengan filter jika keyword ada
$query = "SELECT * FROM t_mahasiswa";
if (!empty($keyword)) {
    $query .= " WHERE namaMhs LIKE '%$keyword%'";
}
$query .= " ORDER BY npm ASC";

$result = mysqli_query($link, $query);

// Cek query
if (!$result) {
    die ("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
}

// Tampilkan data
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$data['npm']}</td>";
        echo "<td>{$data['namaMhs']}</td>";
        echo "<td>{$data['prodi']}</td>";
        echo "<td>{$data['alamat']}</td>";
        echo "<td>{$data['noHP']}</td>";
        echo "<td>
                <a href='editmahasiswa.php?npm={$data['npm']}' class='btn btn-edit'>Edit</a>
                <a href='hapusmahasiswa.php?npm={$data['npm']}' class='btn btn-delete' onclick=\"return confirm('Anda yakin akan menghapus data?')\">Hapus</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Data tidak ditemukan.</td></tr>";
}
?>
        </tbody>
    </table>
</body>
</html>
