<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

if (isset($_POST['update'])) {
    // Ambil data dari form
    $npm_lama = $_POST['npm_lama']; // NPM sebelum diubah
    $npm_baru = $_POST['npm_baru'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    // Update query (jika npm bisa berubah)
    $stmt = $conn->prepare("UPDATE t_mahasiswa SET npm=?, namaMhs=?, prodi=?, alamat=?, noHP=? WHERE npm=?");
    $stmt->bind_param("ssssss", $npm_baru, $namaMhs, $prodi, $alamat, $noHP, $npm_lama);
    $stmt->execute();
    $stmt->close();

    header("Location: viewmahasiswa.php");
    exit();
} else {
    // Jika akses langsung tanpa POST update, redirect ke halaman view
    header("Location: viewmahasiswa.php");
    exit();
}
?>
