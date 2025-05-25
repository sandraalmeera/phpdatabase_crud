<?php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    $kodeMK_lama = $_POST['kodeMK_lama'];
    $kodeMK_baru = $_POST['kodeMK_baru'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    // Query update
    $query = "UPDATE t_matakuliah SET kodeMK = ?, namaMK = ?, sks = ?, jam = ? WHERE kodeMK = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssiii", $kodeMK_baru, $namaMK, $sks, $jam, $kodeMK_lama);
    
    if (mysqli_stmt_execute($stmt)) {
        // Jika update berhasil, redirect ke halaman view dengan pesan sukses (opsional)
        header("Location: viewmatakuliah.php?update=success");
        exit;
    } else {
        // Jika gagal update
        echo "Error: " . mysqli_error($link);
    }
} else {
    // Jika akses langsung ke file ini tanpa submit form
    header("Location: viewmatakuliah.php");
    exit;
}
?>
