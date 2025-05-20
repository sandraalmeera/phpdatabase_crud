<?php
include 'koneksi.php'; // koneksi ke database
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Dosen</title>
    <link rel="stylesheet" type="text/css" href="viewdosen.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 840px;
            margin: auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
        form {
            text-align: center;
            margin: 20px;
        }
        input[type="text"] {
            width: 300px;
            padding: 6px;
        }
        input[type="submit"] {
            padding: 6px 10px;
        }
        a {
            margin: 0 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h1>Tabel Dosen</h1>
    <center class="center"><a href="input.php">Input Data</a></center>

    <!-- Form Search -->
    <form method="GET" action="viewdosen.php">
        <input type="text" name="keyword" placeholder="Cari nama dosen..." value="<?php if (isset($_GET['keyword'])) echo htmlspecialchars($_GET['keyword']); ?>">
        <input type="submit" value="Cari">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Dosen</th>
            <th>No HP</th>
            <th>Pilihan</th>
        </tr>

<?php
// Ambil keyword pencarian
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($link, $_GET['keyword']);
}

// Query pencarian
$query = "SELECT * FROM t_dosen";
if (!empty($keyword)) {
    $query .= " WHERE namaDosen LIKE '%$keyword%'";
}
$query .= " ORDER BY IdDosen ASC";

$result = mysqli_query($link, $query);

// Cek hasil query
if (!$result) {
    die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
}

// Tampilkan data
if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$data['idDosen']}</td>";
        echo "<td>{$data['namaDosen']}</td>";
        echo "<td>{$data['noHP']}</td>";
        echo "<td>
    <a href='editdosen.php?idDosen={$data['idDosen']}' class='btn btn-edit'>Edit</a>
    <a href='hapusdosen.php?idDosen={$data['idDosen']}' class='btn btn-delete' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
</td>";
 
    }
} else {
    echo "<tr><td colspan='4'>Data tidak ditemukan.</td></tr>";
}
?>

    </table>

</body>
</html>
