<?php
// buka koneksi dengan MySQL
include("koneksi.php");

// mengecek apakah di url ada GET npm
if (isset($_GET["npm"])) {

    // menyimpan variabel npm dari url ke dalam variabel $npm
    $npm = $_GET["npm"];

    // jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM t_mahasiswa WHERE npm='$npm'";
    $hasil_query = mysqli_query($link, $query);

    // periksa query, apakah ada kesalahan
    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

// redirect ke halaman viewmahasiswa.php
header("location:viewmahasiswa.php");
?>
