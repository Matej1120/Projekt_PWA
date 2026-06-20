<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['razina']) || (int)$_SESSION['razina'] !== 1) {
    header('Location: login.php');
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "DELETE FROM vijesti WHERE id = ?";
$stmt = mysqli_stmt_init($dbc);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

header('Location: administracija.php');
exit;
?>
