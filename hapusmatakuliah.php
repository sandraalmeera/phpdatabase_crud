<?php
// buka koneksi dengan MySQL
include("koneksi.php");

// mengecek apakah di url ada GET kodeMK
if (isset($_GET["kodeMK"])) {

    // menyimpan variabel kode dari url ke dalam variabel $kodeMK
    $kode = $_GET["kodeMK"];

    // jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM t_matakuliah WHERE kodeMK='$kode'";
    $hasil_query = mysqli_query($link, $query);

    // periksa query, apakah ada kesalahan
    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

// melakukan redirect ke halaman viewmatakuliah.php
header("location:viewmatakuliah.php");
?>
