<?php
include 'koneksi.php';

if (isset($_GET['idDosen'])) {
    $id = $_GET['idDosen'];

    $query = "SELECT * FROM t_dosen WHERE idDosen='$id'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }

    $data = mysqli_fetch_assoc($result);
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
    </style>
</head>
<body>
    <h1>Edit Data</h1>
    <div class="container">
        <form id="form_dosen" action="proses_editdosen.php" method="post">
            <fieldset>
                <legend>Edit Data Dosen</legend>
                <p>
                    <label for="idDosen">ID Dosen:</label><br>
                    <input type="text" name="idDosen" id="idDosen" value="<?php echo $idDosen; ?>" required>
                    <input type="hidden" name="id_lama" value="<?php echo $idDosen; ?>">
                </p>
                <p>
                    <label for="namaDosen">Nama Dosen:</label><br>
                    <input type="text" name="namaDosen" id="namaDosen" value="<?php echo $namaDosen; ?>" required>
                </p>
                <p>
                    <label for="noHP">No HP:</label><br>
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
