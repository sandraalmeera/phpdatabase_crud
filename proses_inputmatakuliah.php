<?php
// memanggil file koneksi.php untuk membuat koneksi ke database
include("koneksi.php");

// mengecek apakah tombol input telah diklik
if (isset($_POST['input'])) {
    // membuat variabel untuk menampung data dari form
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    // membuat dan menjalankan query INSERT
    $query = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam)
              VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";

    $result = mysqli_query($link, $query);

    // periksa hasil query, apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    }
}

// redirect ke halaman viewmatakuliah.php
header("location:viewmatakuliah.php");
?>
