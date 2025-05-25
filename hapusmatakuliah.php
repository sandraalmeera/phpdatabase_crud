<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

if (isset($_GET['id'])) {
    $kodeMK = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM t_matakuliah WHERE kodeMK = ?");
    if ($stmt) {
        $stmt->bind_param("i", $kodeMK);
        $stmt->execute();
        $stmt->close();
    } else {
        die("Gagal menyiapkan statement: " . $conn->error);
    }
}

header("Location: viewmatakuliah.php");
exit();
?>
