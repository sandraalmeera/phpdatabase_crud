<?php
require_once 'Database.php';
$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM t_dosen WHERE idDosen = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: viewdosen.php");
exit();
?>
