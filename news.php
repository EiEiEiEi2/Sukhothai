<?php
include 'connet.php';

$sql = "SELECT * FROM news ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

$thai_months = [
    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน',
    5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม',
    9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ข่าวและประกาศ - จังหวัดสุโขทัย</title>
    <link rel="stylesheet" href="Homepage.css">
</head>
<body>
    <div class="Head">
        <div class="manu">
            <a href="user_page.php">หน้าแรก</a>
            <a href="user_page.php#about">เกียวกับจังหวัด</a>
            <a href="news.php">ข่าวและประกาศ</a>
            <a href="user_page.php#attractions">แหล่งท่องเทียว</a>
            <a href="user_page.php#services">ศูนย์บริการประชาชน</a>
            <a href="Login.php" class="logout-btn">ออกจากระบบ</a>
        </div>
    </div>

    <div class="page-header">
        <h1>ข่าวสารและประกาศ</h1>
        <p>อัปเดตข้อมูลข่าวสารล่าสุดจากหน่วยงานราชการจังหวัดสุโขทัย</p>
    </div>

    <section class="info-section">
        <div class="news-container">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while($n = mysqli_fetch_assoc($result)) { 
                    $timestamp = strtotime($n['created_at']);
                    $d = date('j', $timestamp);
                    $m = $thai_months[(int)date('n', $timestamp)];
                    $y = date('Y', $timestamp) + 543;
                ?>
                <div class="news-card">
                    <div class="news-date"><?php echo "$d $m $y"; ?></div>
                    <h3><?php echo htmlspecialchars($n['title']); ?></h3>
                    <p style="white-space: pre-wrap; margin-bottom: 0;"><?php echo htmlspecialchars($n['content']); ?></p>
                </div>
                <?php } ?>
            <?php } else { ?>
                <div class="news-card" style="text-align: center;">
                    <p style="margin-bottom: 0;">ยังไม่มีข่าวสารในขณะนี้...</p>
                </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>
