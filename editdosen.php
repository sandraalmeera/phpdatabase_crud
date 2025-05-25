<?php
include 'koneksi.php'; // atau bisa juga require 'Database.php' jika pakai class Database

if (isset($_GET['idDosen'])) {
    $id = $_GET['idDosen'];

    $query = "SELECT * FROM t_dosen WHERE idDosen = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        // Jika data tidak ditemukan, redirect
        header("location:viewdosen.php");
        exit;
    }

    $idDosen = $data["idDosen"];
    $namaDosen = $data["namaDosen"];
    $noHP = $data["noHP"];
} else {
    header("location:viewdosen.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="editdosen.css">
    <style>
        h1 { text-align: center; }
        .container { width: 400px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input[type=text] { width: 100%; padding: 5px; }
        input[type=submit] { margin-top: 15px; padding: 10px 15px; }
    </style>
</head>
<body>
    <h1>Edit Data Dosen</h1>
    <div class="container">
        <form id="form_dosen" action="proses_editdosen.php" method="post">
            <fieldset>
                <legend>Edit Data Dosen</legend>
                <p>
                    <label for="idDosen">ID Dosen:</label>
                    <input type="text" name="idDosen" id="idDosen" value="<?php echo htmlspecialchars($idDosen); ?>" required>
                    <!-- Simpan ID lama untuk WHERE saat update -->
                    <input type="hidden" name="id_lama" value="<?php echo htmlspecialchars($idDosen); ?>">
                </p>
                <p>
                    <label for="namaDosen">Nama Dosen:</label>
                    <input type="text" name="namaDosen" id="namaDosen" value="<?php echo htmlspecialchars($namaDosen); ?>" required>
                </p>
                <p>
                    <label for="noHP">No HP:</label>
                    <input type="text" name="noHP" id="noHP" value="<?php echo htmlspecialchars($noHP); ?>" required>
                </p>
            </fieldset>
            <p>
                <input type="submit" name="update" value="Update Data">
            </p>
        </form>
    </div>
</body>
</html>
