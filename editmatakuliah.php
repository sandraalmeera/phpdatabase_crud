<?php
include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK = $_GET['kodeMK'];

    $query = "SELECT * FROM t_matakuliah WHERE kodeMK = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $kodeMK);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("Data tidak ditemukan.");
    }

    $data = mysqli_fetch_assoc($result);
    $namaMK = $data["namaMK"];
    $sks = $data["sks"];
    $jam = $data["jam"];
} else {
    header("location:viewmatakuliah.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="editmatakuliah.css" />
    <style>
        h1 { text-align: center; }
        .container { width: 400px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; }
        input[type="submit"] { margin-top: 15px; padding: 10px 20px; }
    </style>
</head>
<body>
    <h1>Edit Data Mata Kuliah</h1>
    <div class="container">
        <form action="proses_editmatakuliah.php" method="post">
            <fieldset>
                <legend>Form Edit Mata Kuliah</legend>
                
                <input type="hidden" name="kodeMK_lama" value="<?php echo $kodeMK; ?>">

                <label for="kodeMK">Kode MK:</label>
                <input type="text" name="kodeMK_baru" id="kodeMK" value="<?php echo $kodeMK; ?>" required>

                <label for="namaMK">Nama Mata Kuliah:</label>
                <input type="text" name="namaMK" id="namaMK" value="<?php echo $namaMK; ?>" required>

                <label for="sks">SKS:</label>
                <input type="number" name="sks" id="sks" value="<?php echo $sks; ?>" required>

                <label for="jam">Jam:</label>
                <input type="number" name="jam" id="jam" value="<?php echo $jam; ?>" required>
            </fieldset>

            <input type="submit" name="edit" value="Update Data">
        </form>
    </div>
</body>
</html>
