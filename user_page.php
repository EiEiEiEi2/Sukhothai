<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
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
    <div class="hero-banner">
        <h1>ยินดีต้อนรับสู่จังหวัดสุโขทัย</h1>
        <p>รุ่งอรุณแห่งความสุข มรดกโลกทางวัฒนธรรม</p>
    </div>

    <section id="about" class="info-section">
        <h2 class="section-title">เกี่ยวกับจังหวัดสุโขทัย</h2>
        <div class="content-box">
            <p>จังหวัดสุโขทัย (Sukhothai) เป็นจังหวัดหนึ่งในภาคกลางตอนบนของประเทศไทย มีความสำคัญในฐานะเป็นราชธานีแห่งแรกของชาวไทยเมื่อกว่า 700 ปีมาแล้ว คำว่า "สุโขทัย" มาจากคำศัพท์สองคำคือ "สุข" และ "อุทัย" หมายความว่า "รุ่งอรุณแห่งความสุข"</p>
            <p>ปัจจุบันสุโขทัยเป็นเมืองแห่งมรดกโลก (UNESCO World Heritage Site) ที่เต็มไปด้วยประวัติศาสตร์ ศิลปวัฒนธรรม และโบราณสถานอันทรงคุณค่า</p>
        </div>
    </section>

    <section id="attractions" class="info-section">
        <h2 class="section-title">แหล่งท่องเที่ยวแนะนำ</h2>
        <main class="gallery-container">
        <div class="gallery-track">
            <div class="card-image">
                <img src="images/1.png" alt="Wat Mahathat">
            </div>
            <div class="card-image">
                <img src="images/2.png" alt="Loy Krathong">
            </div>
            <div class="card-image">
                <img src="images/3.png" alt="Buddha Statue">
            </div>
            <div class="card-image">
                <img src="images/4.png" alt="Wat Si Chum">
            </div>
            <div class="card-image">
                <img src="images/5.png" alt="Sukhothai Artifacts">
            </div>
            <div class="card-image">
                <img src="images/1.png" alt="Wat Mahathat">
            </div>
            <div class="card-image">
                <img src="images/2.png" alt="Loy Krathong">
            </div>
            <div class="card-image">
                <img src="images/3.png" alt="Buddha Statue">
            </div>
            <div class="card-image">
                <img src="images/4.png" alt="Wat Si Chum">
            </div>
        </div>
        </div>
    </main>
    </section>

    <section id="services" class="info-section">
        <h2 class="section-title">ศูนย์บริการประชาชน</h2>
        <div class="services-grid">
            <div class="service-card">
                <h3>ศาลากลางจังหวัด</h3>
                <p>ติดต่อราชการ ชั้น 1-5 อาคารศาลากลาง</p>
            </div>
            <div class="service-card">
                <h3>ศูนย์ดำรงธรรม</h3>
                <p>รับเรื่องราวร้องทุกข์ ติดต่อ โทร. 1567</p>
            </div>
            <div class="service-card">
                <h3>งานทะเบียน</h3>
                <p>ทำบัตรประชาชน แจ้งเกิด แนะนำบริการออนไลน์</p>
            </div>
        </div>
    </section>
</body>
</html>