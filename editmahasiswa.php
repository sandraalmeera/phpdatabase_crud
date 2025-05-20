<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

// mengecek apakah url ada nilai GET npm
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // ambil data dari database
    $query = "SELECT * FROM t_mahasiswa WHERE npm='$npm'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
    $namaMhs = $data["namaMhs"];
    $prodi = $data["prodi"];
    $alamat = $data["alamat"];
    $noHP = $data["noHP"];
} else {
    header("location:viewmahasiswa.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="editmahasiswa.css" />
    <style>
        h1 {
            text-align: center;
        }
        .container {
            width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>
    <div class="container">
        <form action="proses_editmahasiswa.php" method="post">
            <fieldset>
                <legend>Edit Data Mahasiswa</legend>
                <p>
                    <label for="npm">NPM:</label>
                    <!-- Simpan NPM lama -->
                    <input type="hidden" name="npm_lama" value="<?php echo $npm; ?>">
                    <!-- Field untuk mengedit NPM -->
                    <input type="text" name="npm_baru" id="npm" value="<?php echo $npm; ?>" required>
                </p>
                <p>
                    <label for="namaMhs">Nama Mahasiswa:</label>
                    <input type="text" name="namaMhs" id="namaMhs" value="<?php echo $namaMhs; ?>" required>
                </p>
                <p>
                    <label for="prodi">Program Studi:</label>
                    <input type="text" name="prodi" id="prodi" value="<?php echo $prodi; ?>" required>
                </p>
                <p>
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo $alamat; ?>" required>
                </p>
                <p>
                    <label for="noHP">No HP:</label>
                    <input type="text" name="noHP" id="noHP" value="<?php echo $noHP; ?>" required>
                </p>
            </fieldset>
            <p>
                <input type="submit" name="edit" value="Update Data">
            </p>
        </form>
    </div>
</body>
</html>
