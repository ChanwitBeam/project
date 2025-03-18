<?php
include "config.php";

// ตรวจสอบการส่งข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];  // เพิ่มฟิลด์อีเมล
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // ตรวจสอบว่า รหัสผ่านและยืนยันรหัสผ่านตรงกันหรือไม่
    if ($password !== $confirm_password) {
        $error_message = "รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน";
    } else {
        // เข้ารหัสรหัสผ่านก่อนเก็บ
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // ตรวจสอบว่า ชื่อผู้ใช้หรืออีเมลมีอยู่แล้วในฐานข้อมูลหรือไม่
        $sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error_message = "ชื่อผู้ใช้หรืออีเมลนี้มีอยู่แล้ว";
        } else {
            // เพิ่มข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                header("Location: login.php");  // เปลี่ยนเส้นทางไปที่หน้าเข้าสู่ระบบหลังจากสมัครสำเร็จ
                exit();
            } else {
                $error_message = "เกิดข้อผิดพลาดในการสมัครสมาชิก";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .signup-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input[type="password"] {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>สมัครสมาชิก</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
    <label for="email">อีเมล:</label>
    <input type="email" id="email" name="email" required>
</div>

            <button type="submit">สมัครสมาชิก</button>
        </form>
        <div class="error-message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($error_message)) {
                echo $error_message;
            }
            ?>
        </div>
    </div>
    
</body>

</html>
