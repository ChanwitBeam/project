<?php
session_start();
include "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$image = $_POST['image'];

$sql = "UPDATE places SET name='$name', description='$description', image='$image' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: manage_places.php");
    exit();
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}
?>
