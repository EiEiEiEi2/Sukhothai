<?php
include "connet.php";
$username = $_POST['Username'];
$password = $_POST['Password'];
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);
// ตรวจสอบว่าพบข้อมูลหรือไม่ (ถ้าพบ แสดงว่ารหัสถูกต้อง)
if (mysqli_num_rows($result) > 0) {
    
    // ดึงข้อมูลของคนที่ล็อกอินสำเร็จออกมาอ่านค่า
    $row = mysqli_fetch_assoc($result);
    
    // เก็บข้อมูลลง Session
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    // เช็คสิทธิ์ (Role) ว่าเป็น User (1) หรือ Admin (2)
    if ($row['role'] == 1) {
        echo "<script>alert('เข้าสู่ระบบสำเร็จ! ยินดีต้อนรับ User'); window.location.href='user_page.php';</script>";
    } elseif ($row['role'] == 2) {
        echo "<script>alert('เข้าสู่ระบบสำเร็จ! ยินดีต้อนรับ Admin'); window.location.href='admin_page.php';</script>";
    }

} else {
    // ถ้าไม่พบข้อมูล แสดงว่า Username หรือ Password ผิด
    echo "<script>alert('Username หรือ Password ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง'); window.history.back();</script>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?> 