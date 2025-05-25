<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $npm = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM t_mahasiswa WHERE npm = ?");
    if ($stmt) {
        $stmt->bind_param("i", $npm);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Gagal menyiapkan statement: " . $conn->error);
    }
}

header("Location: viewmahasiswa.php");
exit();
?>
