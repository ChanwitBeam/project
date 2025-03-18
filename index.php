<?php
session_start();
include "config.php"; // เชื่อมต่อฐานข้อมูล
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แนะนำสถานที่ท่องเที่ยว นครพนม</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        แนะนำสถานที่ท่องเที่ยว นครพนม
    </div>

    <div class="navbar">
    <a href="index.php">หน้าแรก</a>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="dashboard.php">เพิ่มสถานที่ท่องเที่ยว</a>
        <a href="logout.php">ออกจากระบบ</a>
    <?php else: ?>
        <a href="login.php">เข้าสู่ระบบ</a>
        <a href="register.php">สมัครสมาชิก</a>
    <?php endif; ?>
</div>


    <div class="container">
        <h2>สถานที่ท่องเที่ยวแนะนำ</h2>
        <div class="place-card">
            <?php
            // ดึงข้อมูลสถานที่ท่องเที่ยวจากฐานข้อมูล
            $sql = "SELECT * FROM places";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <div class="place-item">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <a href="dashboard.php?id=<?php echo $row['id']; ?>" class="button"></a>
            </div>
            <?php
                endwhile;
            else:
                echo "<p>ไม่มีข้อมูลสถานที่ท่องเที่ยว</p>";
            endif;
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 นครพนม ท่องเที่ยว. ทุกสิทธิ์สงวน.</p>
    </footer>

    <style>
        /* ปรับ footer ให้ติดขอบล่าง */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            flex: 1;
            padding: 20px;
        }

        footer {
            background-color: #0056b3;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            width: 100%;
        }

        @media (max-width: 768px) {
            footer {
                font-size: 12px;
            }
        }

        .place-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}


        .place-item {
            width: 300px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .place-item img {
            width: 100%;
            border-radius: 10px;
        }

        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background:rgb(255, 255, 255);
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background: #0056b3;
        }
    </style>

</body>
</html>
