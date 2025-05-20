<?php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    $npm_lama = $_POST['npm_lama'];
    $npm_baru = $_POST['npm_baru'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    // Cek apakah NPM baru sudah digunakan oleh mahasiswa lain
    if ($npm_lama !== $npm_baru) {
        $cek_query = "SELECT * FROM t_mahasiswa WHERE npm = '$npm_baru'";
        $cek_result = mysqli_query($link, $cek_query);
        if (mysqli_num_rows($cek_result) > 0) {
            die("NPM baru sudah digunakan. Silakan gunakan NPM lain.");
        }
    }

    // Lakukan update data
    $query = "UPDATE t_mahasiswa SET 
                npm = '$npm_baru',
                namaMhs = '$namaMhs', 
                prodi = '$prodi', 
                alamat = '$alamat', 
                noHP = '$noHP' 
              WHERE npm = '$npm_lama'";

    $result = mysqli_query($link, $query);

    if ($result) {
        header("Location: viewmahasiswa.php");
    } else {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
} else {
    header("Location: viewmahasiswa.php");
}
?>
