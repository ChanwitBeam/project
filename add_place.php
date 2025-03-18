<?php
session_start();
include "config.php";

// เช็คว่าผู้ใช้ล็อกอินหรือยัง
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// รับค่าจากฟอร์ม
$name = $_POST['name'];
$description = $_POST['description'];
$image = $_POST['image'];

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO places (name, description, image) VALUES ('$name', '$description', '$image')";

if ($conn->query($sql) === TRUE) {
    header("Location: manage_places.php");
    exit();
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}
?>
