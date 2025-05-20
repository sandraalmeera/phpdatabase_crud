<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['input'])) {

    // membuat variabel untuk menampung data dari form
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    // jalankan query INSERT untuk menambah data ke database
    $query = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) 
              VALUES ('$npm', '$namaMhs', '$prodi', '$alamat', '$noHP')";
    $result = mysqli_query($link, $query);

    // periksa query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($link).
             " - ".mysqli_error($link));
    }
}

// melakukan redirect (mengalihkan) ke halaman viewmahasiswa.php
header("location:viewmahasiswa.php");
?>
