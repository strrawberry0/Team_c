<?php
// index.php (PHP 구동 + DB 연동 예시)
// DB 연결 정보
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'stob_db';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die('DB 연결 실패: ' . $conn->connect_error);
}

// 예시: 차트 데이터 가져오기
$chart1 = [];
$chart2 = [];
$sql1 = "SELECT * FROM chart WHERE type='domestic' ORDER BY rank ASC LIMIT 5";
$sql2 = "SELECT * FROM chart WHERE type='global' ORDER BY rank ASC LIMIT 5";
$res1 = $conn->query($sql1);
$res2 = $conn->query($sql2);
if ($res1) {
    while ($row = $res1->fetch_assoc()) {
        $chart1[] = $row;
    }
}
if ($res2) {
    while ($row = $res2->fetch_assoc()) {
        $chart2[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>stob,</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/font.css" />
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/index.js" defer></script>
</head>

<body>
    <header>
        <h1>stob,</h1>
        <div class="cash">
            <a href="/buypage.html"><i class="fa-solid fa-credit-card"></i></a>
        </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none"><img class="bn1" src="./img/banner1.jpg" alt="bn1" /></a>
                </div>
                <div class="swiper-slide">
                    <a href="#none"><img class="bn2" src="./img/banner2.jpg" alt="bn2" /></a>
                </div>
                <div class="swiper-slide">
                    <a href="#none"><img class="bn3" src="./img/banner3.jpg" alt="bn3" /></a>
                </div>
                <div class="swiper-slide">
                    <a href="#none"><img class="bn4" src="./img/banner4.jpg" alt="bn4" /></a>
                </div>
                <div class="swiper-slide">
                    <a href="#none"><img class="bn5" src="./img/banner5.jpg" alt="bn5" /></a>
                </div>
            </div>
        </div>
    </header>
    <div id="section1">
        <h2><span>BEST</span> CHART</h2>
        <div class="btn">
            <ul>
                <li><button type="button" class="secbtn btn1" data-index="0">국내</button></li>
                <li><button type="button" class="secbtn btn2" data-index="1">해외</button></li>
            </ul>
        </div>
        <div id="chart_wrap">
            <div id="chart_inner">
                <div class="chart1">
                    <?php foreach ($chart1 as $row): ?>
                    <div class="rank rank<?= $row['rank'] ?>">
                        <img src="<?= htmlspecialchars($row['img']) ?>" alt="rank<?= $row['rank'] ?>" />
                        <h3><?= $row['rank'] ?>.</h3>
                        <p>
                            <span><?= htmlspecialchars($row['title']) ?><br /></span>
                            <span class="artistname"><?= htmlspecialchars($row['artist']) ?></span>
                        </p>
                        <button type="button" class="ham">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="chart2">
                    <?php foreach ($chart2 as $row): ?>
                    <div class="rank rank<?= $row['rank'] ?>">
                        <img src="<?= htmlspecialchars($row['img']) ?>" alt="rank<?= $row['rank'] ?>" />
                        <h3><?= $row['rank'] ?>.</h3>
                        <p>
                            <span><?= htmlspecialchars($row['title']) ?><br /></span>
                            <span class="artistname"><?= htmlspecialchars($row['artist']) ?></span>
                        </p>
                        <button type="button" class="ham">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- section2, section3, section4 등은 필요에 따라 PHP+DB 연동으로 변환 가능 -->
    <footer>
        <div class="play">
            <img src="./img/now1.png" alt="now1" />
            <span>
                <p>Midnight Rendezvous</p>
                Casiopea
            </span>
            <button type="button" class="button">
                <i class="fa-solid fa-backward-step"></i>
                <i class="fa-solid fa-play"></i>
                <i class="fa-solid fa-forward-step"></i>
                <i class="fa-solid fa-indent"></i>
            </button>
        </div>
        <div class="menu">
            <div class="box1">
                <a href="/category.html"><i class="fa-solid fa-layer-group"></i></a>
            </div>
            <div class="box2">
                <a href="#none"><i class="fa-solid fa-folder-open"></i></a>
            </div>
            <div class="box3">
                <a href="/index.php"><i class="fa-solid fa-house"></i></a>
            </div>
            <div class="box4">
                <a href="/search.html"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
            <div class="box5">
                <a href="/mypage.html"><i class="fa-solid fa-circle-user"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>