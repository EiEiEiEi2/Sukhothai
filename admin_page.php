<?php
include 'connet.php';

$action = $_POST['action'] ?? '';
$get_delete = $_GET['delete_user_id'] ?? '';

if ($action == 'add_user'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', $role)";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('เพิ่มผู้ใช้สำเร็จ!'); window.location.href='admin_page.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่ม'); window.history.back();</script>";
    }
}

if ($action == 'edit_user'){
    $id = $_POST['user_id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    
    if ($_POST['password'] != ""){
        $password = $_POST['password'];
        $sql = "UPDATE users SET username='$username', password='$password', role='$role' WHERE id='$id'";
    } else {
        $sql = "UPDATE users SET username='$username', role='$role' WHERE id='$id'";
    }
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('แก้ไขผู้ใช้สำเร็จ!'); window.location.href='admin_page.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไข'); window.history.back();</script>";
    }
}

if ($get_delete != ""){
    $id = $_GET['delete_user_id'];
    
    $check_sql = "SELECT role FROM users WHERE id='$id'";
    $check_result = mysqli_query($conn, $check_sql);
    $row = mysqli_fetch_assoc($check_result);
    
    if ($row['role'] == 2){
        echo "<script>alert('แอดมินลบไม่ได้'); window.history.back();</script>";
        exit;
    }
    
    $sql = "DELETE FROM users WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('ลบผู้ใช้สำเร็จ!'); window.location.href='admin_page.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบ'); window.history.back();</script>";
    }
}

$sql_all = "SELECT * FROM users";
$result_all = mysqli_query($conn, $sql_all);

$editUser = null;
if (isset($_GET['edit_user_id'])){
    $id = $_GET['edit_user_id'];
    $sql_edit = "SELECT * FROM users WHERE id='$id'";
    $result_edit = mysqli_query($conn, $sql_edit);
    $editUser = mysqli_fetch_assoc($result_edit);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Homepage.css">
    <title>Admin</title>
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap');
    </style>
</head>
<body>
    <div class="Head">
        <div class="manu">
            <a href="user_page.php">หน้าแรก</a>
            <a href="news.php">ดูหน้าข่าว</a>
            <a href="admin_page.php">ระบบจัดการผู้ใช้</a>
            <a href="admin_news.php">ระบบจัดการข่าว</a>
            <a href="Login.php" class="logout-btn">ออกจากระบบ</a>
        </div>
    </div>
    
    <div class="page-header">
        <h1>ระบบจัดการ (Admin)</h1>
    </div>

    <center>
    <div class="LoginF" style="margin-top: 20px;">
        <form action="admin_page.php" method="POST">
            <?php if ($editUser){ ?>
            <input type="hidden" name="action" value="edit_user">
            <input type="hidden" name="user_id" value="<?php echo $editUser['id']; ?>">
            <h3>Edit User</h3>
            <?php } else { ?>
            <input type="hidden" name="action" value="add_user">
            <h3>Add User</h3>
            <?php } ?>
            <br>
            
            <h3>Username</h3>
            <input type="text" class="username1" name="username" placeholder="Username" value="<?php if ($editUser) echo $editUser['username']; ?>" required><br><br>
            
            <h3>Password</h3>
            <input type="text" class="Password1" name="password" placeholder="Password"><br><br>
            
            <h3>Role</h3>
            <select name="role" class="username1" style="width:170px; height:30px;">
                <option value="1" <?php if ($editUser && $editUser['role'] == 1) echo 'selected'; ?>>User</option>
                <option value="2" <?php if ($editUser && $editUser['role'] == 2) echo 'selected'; ?>>Admin</option>
            </select><br><br><br>
            
            <input type="submit" value="Save" class="reg1btt" style="width:100px; height:30px;"><br><br>
            <hr><br>
            <?php if ($editUser){ ?>
            <a href="admin_page.php" class="back">Cancel</a>
            <?php } ?>
        </form>
    </div>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0" width="80%">
        <tr bgcolor="#d1bfae">
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php while($u = mysqli_fetch_assoc($result_all)){ ?>
        <tr align="center" bgcolor="#ffffff">
            <td><?php echo $u['id']; ?></td>
            <td><?php echo $u['username']; ?></td>
            <td><?php echo $u['password']; ?></td>
            <td><?php if($u['role'] == 2) echo 'Admin'; else echo 'User'; ?></td>
            <td>
                <a href="admin_page.php?edit_user_id=<?php echo $u['id']; ?>">Edit</a> | 
                <?php if ($u['role'] != 2){ ?>
                <a href="admin_page.php?delete_user_id=<?php echo $u['id']; ?>">Delete</a>
                <?php } else { ?>
                <span>No Delete</span>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br><br>
    </center>
</body>
</html>
