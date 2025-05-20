<?php
if (isset($_POST['edit'])) {
    include("koneksi.php");

    // Ambil data dari form
    $id_lama = $_POST['id_lama']; // ID sebelum diedit
    $id_baru = $_POST['idDosen']; // ID setelah diedit
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    // Update query
    $query = "UPDATE t_dosen 
              SET idDosen = '$id_baru', namaDosen = '$namaDosen', noHP = '$noHP' 
              WHERE idDosen = '$id_lama'";

    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
}

// Redirect
header("location:viewdosen.php");
exit;
?>
