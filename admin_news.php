<?php
include 'connet.php';

$action = $_POST['action'] ?? '';
$get_delete = $_GET['delete_news_id'] ?? '';

if ($action == 'add_news'){
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "INSERT INTO news (title, content) VALUES ('$title', '$content')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('เพิ่มข่าวสำเร็จ!'); window.location.href='admin_news.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่ม'); window.history.back();</script>";
    }
}

if ($action == 'edit_news'){
    $id = $_POST['news_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "UPDATE news SET title='$title', content='$content' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('แก้ไขข่าวสำเร็จ!'); window.location.href='admin_news.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไข'); window.history.back();</script>";
    }
}

if ($get_delete != ""){
    $id = $_GET['delete_news_id'];
    
    $sql = "DELETE FROM news WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('ลบข่าวสำเร็จ!'); window.location.href='admin_news.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการลบ'); window.history.back();</script>";
    }
}

$sql_all = "SELECT * FROM news ORDER BY created_at DESC";
$result_all = mysqli_query($conn, $sql_all);

$editNews = null;
if (isset($_GET['edit_news_id'])){
    $id = $_GET['edit_news_id'];
    $sql_edit = "SELECT * FROM news WHERE id='$id'";
    $result_edit = mysqli_query($conn, $sql_edit);
    $editNews = mysqli_fetch_assoc($result_edit);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Homepage.css">
    <title>Admin - News</title>
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
        <h1>ระบบจัดการข่าวสาร (News Admin)</h1>
    </div>

    <center>
    <div class="LoginF" style="margin-top: 20px; width: 60%; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <form action="admin_news.php" method="POST">
            <?php if ($editNews){ ?>
            <input type="hidden" name="action" value="edit_news">
            <input type="hidden" name="news_id" value="<?php echo $editNews['id']; ?>">
            <h3>แก้ไขข่าว</h3>
            <?php } else { ?>
            <input type="hidden" name="action" value="add_news">
            <h3>เพิ่มข่าวใหม่</h3>
            <?php } ?>
            <br>
            
            <h3 style="text-align: left;">หัวข้อข่าว (Title)</h3>
            <input type="text" class="username1" name="title" placeholder="หัวข้อข่าว" value="<?php if ($editNews) echo htmlspecialchars($editNews['title']); ?>" required style="width: 100%; box-sizing: border-box; padding: 10px; margin-bottom: 10px;"><br>
            
            <h3 style="text-align: left;">เนื้อหาข่าว (Content)</h3>
            <textarea class="username1" name="content" placeholder="เนื้อหาข่าวแบบย่อ หรือแบบเต็ม..." required style="width: 100%; height: 100px; padding: 10px; resize: vertical; box-sizing: border-box; margin-bottom: 20px; font-family: inherit;"><?php if ($editNews) echo htmlspecialchars($editNews['content']); ?></textarea><br>
            
            <input type="submit" value="บันทึก (Save)" class="reg1btt" style="width:150px; height:40px; cursor: pointer; background-color: #3e362e; color: #fff; border: none; border-radius: 5px;"><br><br>
            <?php if ($editNews){ ?>
            <a href="admin_news.php" class="back" style="color: #3e362e; font-weight: bold;">ยกเลิก (Cancel)</a>
            <?php } ?>
        </form>
    </div>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0" width="80%">
        <tr bgcolor="#d1bfae">
            <th>ID</th>
            <th width="30%">หัวข้อข่าว</th>
            <th width="40%">เนื้อหา (บางส่วน)</th>
            <th>วันที่สร้าง</th>
            <th>จัดการ</th>
        </tr>
        <?php while($n = mysqli_fetch_assoc($result_all)){ ?>
        <tr align="center" bgcolor="#ffffff">
            <td><?php echo $n['id']; ?></td>
            <td style="text-align: left;"><?php echo htmlspecialchars($n['title']); ?></td>
            <td style="text-align: left;"><?php echo mb_strimwidth(htmlspecialchars($n['content']), 0, 50, "..."); ?></td>
            <td><?php echo date('d/m/Y H:i', strtotime($n['created_at'])); ?></td>
            <td>
                <a href="admin_news.php?edit_news_id=<?php echo $n['id']; ?>">Edit</a> | 
                <a href="admin_news.php?delete_news_id=<?php echo $n['id']; ?>" onclick="return confirm('ยืนยันการลบข่าวนี้?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br><br>
    </center>
</body>
</html>
