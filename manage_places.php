<?php
session_start();
include "config.php";

// เช็คว่าผู้ใช้ล็อกอินหรือยัง
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสถานที่ท่องเที่ยว</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    จัดการสถานที่ท่องเที่ยว 🏞️
</div>

<div class="navbar">
    <a href="index.php">หน้าแรก</a>
    <a href="dashboard.php">แดชบอร์ด</a>
    <a href="logout.php">ออกจากระบบ</a>
</div>

<div class="container">
<h2>เพิ่มสถานที่ท่องเที่ยว</h2>
<form action="add_place_process.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>ชื่อสถานที่:</label>
        <input type="text" name="name" required>
    </div>
    <div class="form-group">
        <label>คำอธิบาย:</label>
        <textarea name="description" required></textarea>
    </div>
    <div class="form-group">
        <label>เลือกรูปภาพ:</label>
        <input type="file" name="image" required>
    </div>
    <button type="submit" class="btn">เพิ่มสถานที่</button>
</form>


    <h2>รายการสถานที่ท่องเที่ยว</h2>
    <table>
        <tr>
            <th>ชื่อสถานที่</th>
            <th>คำอธิบาย</th>
            <th>รูปภาพ</th>
            <th>จัดการ</th>
        </tr>
        <?php
        $sql = "SELECT * FROM places";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td><img src='images/" . $row["image"] . "' width='100'></td>";
                echo "<td>
                        <a href='edit_place.php?id=" . $row["id"] . "' class='btn-edit'>แก้ไข</a>
                        <a href='delete_place.php?id=" . $row["id"] . "' class='btn-delete' onclick='return confirm(\"คุณแน่ใจหรือไม่?\")'>ลบ</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่มีข้อมูล</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
