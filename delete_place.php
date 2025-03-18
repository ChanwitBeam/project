<?php
session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "DELETE FROM places WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: manage_places.php");
    exit();
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}
?>
