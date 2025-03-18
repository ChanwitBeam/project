<?php
include "config.php"; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];

    // ตรวจสอบว่ามีการอัปโหลดไฟล์
    if ($_FILES["image"]["error"] == 0) {
        $target_dir = "images/"; // โฟลเดอร์เก็บรูป
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // ย้ายไฟล์ไปที่โฟลเดอร์ images/
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $_FILES["image"]["name"];

            // เพิ่มข้อมูลลงฐานข้อมูล
            $sql = "INSERT INTO places (name, description, image) VALUES ('$name', '$description', '$image')";
            if ($conn->query($sql) === TRUE) {
                echo "เพิ่มสถานที่เรียบร้อย!";
                header("Location: index.php");
                exit();
            } else {
                echo "เกิดข้อผิดพลาด: " . $conn->error;
            }
        } else {
            echo "อัปโหลดไฟล์ไม่สำเร็จ!";
        }
    } else {
        echo "กรุณาเลือกรูปภาพ!";
    }
}
?>
