<?php
session_start();
include "config.php";

// เช็คว่าผู้ใช้ล็อกอินหรือยัง
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM places WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสถานที่</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>แก้ไขสถานที่</h2>
    <form action="update_place.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label>ชื่อสถานที่:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label>คำอธิบาย:</label>
            <textarea name="description" required><?php echo $row['description']; ?></textarea>
        </div>
        <div class="form-group">
            <label>ชื่อไฟล์รูปภาพ:</label>
            <input type="text" name="image" value="<?php echo $row['image']; ?>" required>
        </div>
        <button type="submit" class="btn">บันทึก</button>
    </form>
</div>

</body>
</html>
