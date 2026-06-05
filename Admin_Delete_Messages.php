<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "aetherionmessages_db");
if ($conn->connect_error) {
    die("Koneksi gagal");
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: admin.php");
exit;
