<?php
session_start();

// เช็คว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config.php";
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แดชบอร์ด</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    ยินดีต้อนรับ, <?php echo $_SESSION['username']; ?> 🎉
</div>

<div class="navbar">
    <a href="index.php">หน้าแรก</a>
    <a href="dashboard.php">แดชบอร์ด</a>
    <a href="logout.php">ออกจากระบบ</a>
</div>

<div class="container">
    <h2>รายละเอียด</h2>
    <p>ยินดีต้อนรับ <strong><?php echo $_SESSION['username']; ?></strong>!</p>

    <h3>ข้อมูลส่วนตัว</h3>
    <?php
    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p><strong>ชื่อผู้ใช้:</strong> " . $row['username'] . "</p>";
        echo "<p><strong>อีเมล:</strong> " . $row['email'] . "</p>";
    } else {
        echo "<p>ไม่พบข้อมูล</p>";
    }
    ?>

    <h3>เมนู</h3>
    <ul>
        <li><a href="manage_places.php">จัดการสถานที่ท่องเที่ยว</a></li>
        <li><a href="logout.php">ออกจากระบบ</a></li>
    </ul>
</div>

</body>
</html>
