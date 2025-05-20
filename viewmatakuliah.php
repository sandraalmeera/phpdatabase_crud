<?php
// memanggil file koneksi.php
include("koneksi.php");

// cek apakah ada keyword pencarian
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

// query dengan filter jika ada keyword
if (!empty($keyword)) {
    $query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM t_matakuliah";
}

$result = mysqli_query($link, $query);

// cek jika query gagal
if (!$result) {
    die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Kuliah</title>
    <link rel="stylesheet" href="viewmatakuliah.css">
</head>
<body>

<h1>Daftar Mata Kuliah</h1>

<!-- Form Pencarian -->
<form action="viewmatakuliah.php" method="get">
    <input type="text" name="keyword" placeholder="Cari berdasarkan Nama Mata Kuliah" value="<?php echo htmlspecialchars($keyword); ?>">
    <input type="submit" value="Cari">
</form>

<!-- Tombol Tambah -->
<div class="center">
    <a href="input_matakuliah.php">+ Tambah Mata Kuliah</a>
</div>

<!-- Tabel Mata Kuliah -->
<table>
    <thead>
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Jam</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['kodeMK']; ?></td>
                <td><?php echo $row['namaMK']; ?></td>
                <td><?php echo $row['sks']; ?></td>
                <td><?php echo $row['jam']; ?></td>
                <td>
                    <a href="editmatakuliah.php?kodeMK=<?php echo $row['kodeMK']; ?>" class="btn btn-edit">Edit</a>
                    <a href="hapusmatakuliah.php?kodeMK=<?php echo $row['kodeMK']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Data tidak ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
