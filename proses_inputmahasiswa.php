<?php
include 'koneksi.php';

if (isset($_POST['input'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    $query = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $npm, $namaMhs, $prodi, $alamat, $noHP);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: viewmahasiswa.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($link);
    }
}
?>
