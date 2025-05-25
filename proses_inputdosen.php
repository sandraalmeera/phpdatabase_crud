<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $idDosen = $_POST['idDosen'];
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    // Query insert dengan 3 kolom
    $query = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sss", $idDosen, $namaDosen, $noHP);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: viewdosen.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($link);
    }
}
?>
