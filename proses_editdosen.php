<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

if (isset($_POST['update'])) {
    $idDosen = $_POST['idDosen'];
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];
    $id_lama = $_POST['id_lama'];

    $stmt = $conn->prepare("UPDATE t_dosen SET idDosen = ?, namaDosen = ?, noHP = ? WHERE idDosen = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $idDosen, $namaDosen, $noHP, $id_lama);

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
}

header("Location: viewdosen.php");
exit();
?>
