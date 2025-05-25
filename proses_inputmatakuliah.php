<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    $query = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssii", $kodeMK, $namaMK, $sks, $jam);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: viewmatakuliah.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($link);
    }
}
?>
