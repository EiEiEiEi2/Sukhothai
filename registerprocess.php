<?php
include 'connet.php';
$username = $_POST['Username'];
$password = $_POST['Password'];
$password_confirm = $_POST['Password2'];
if ($password !== $password_confirm){
    echo "<script>alert('รหัสผ่านไม่ตรงกัน'); window.history.back();</script>";
    exit; 
}
$role = 1;
$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', $role)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('สมัครสมาชิกสำเร็จ!'); window.location.href='Login.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการสมัคร'); window.history.back();</script>";
}

mysqli_close($conn);
?>