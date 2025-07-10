<?php
// DB 연결 (닷홈 기준 예시)
$host = 'localhost';
$user = 'brothers02'; // 닷홈 DB 아이디
$pass = 'hyeong10!'; // 닷홈 DB 비밀번호
$dbname = 'brothers02'; // 닷홈 DB 이름 (일반적으로 아이디와 동일)
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die('DB 연결 실패: ' . $conn->connect_error);
}

// 폼 전송 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $terms = isset($_POST['term']) ? $_POST['term'] : [];
    // 필수 약관 체크
    $terms_required = in_array('terms', $terms);
    $privacy_required = in_array('privacy', $terms);
    if ($terms_required && $privacy_required) {
        // 회원가입 동의 내역 저장 (예시)
        $sql = "INSERT INTO join_agree (age, terms, privacy, marketing, location, regdate) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $marketing = in_array('marketing', $terms) ? 1 : 0;
        $location = in_array('location', $terms) ? 1 : 0;
        $stmt->bind_param('ssiii', $age, $terms_required, $privacy_required, $marketing, $location);
        $stmt->execute();
        $stmt->close();
        // members.php로 이동
        header('Location: members.php');
        exit;
    } else {
        echo "<script>alert('필수 약관에 동의해 주세요.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="./css/join.css" />
    <title>회원가입 동의</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&display=swap" rel="stylesheet" />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body>
    <header>
        <div class="banner">
            <a href="login.php"><i class="fa-solid fa-xmark"></i></a>
            <h1>stob,</h1>
        </div>
    </header>
    <div class="section1">
        <form class="agreement-form" method="post" action="members.php">
            <!-- 전체 동의 -->
            <div class="agree-all">
                <input type="checkbox" id="agree-all" />
                <label for="agree-all">모두 동의합니다.</label>
            </div>
            <hr />
            <!-- 개별동의 -->
            <ul class="agree-list">
                <li class="agree-item">
                    <label>
                        <input type="checkbox" name="term" value="terms" required />
                        서비스 이용약관 동의&nbsp;&nbsp;<span>* 필수</span>
                    </label>
                    <iconify-icon icon="icon-park-outline:right" class="arrow_right"></iconify-icon>
                </li>
                <li class="agree-item">
                    <label>
                        <input type="checkbox" name="term" value="privacy" />
                        text&nbsp;&nbsp;<span>* 필수</span>
                    </label>
                    <iconify-icon icon="icon-park-outline:right" class="arrow_right"></iconify-icon>
                </li>
                <li class="agree-item">
                    <label>
                        <input type="checkbox" name="term" value="marketing" />
                        text&nbsp;&nbsp;(선택)
                    </label>
                    <iconify-icon icon="icon-park-outline:right" class="arrow_right"></iconify-icon>
                </li>
                <li class="agree-item">
                    <label>
                        <input type="checkbox" name="term" value="location" />
                        text&nbsp;&nbsp;(선택)
                    </label>
                    <iconify-icon icon="icon-park-outline:right" class="arrow_right"></iconify-icon>
                </li>
            </ul>

            <div class="age-buttons">
                <button type="submit" name="age" value="under18" class="btn-under-18">18세 미만</button>
                <button type="submit" name="age" value="adult" class="btn-adult">일반</button>
            </div>
        </form>
    </div>
    <footer>
        <!-- <div class="play">
        <span>현재 재생중인 곡이 없습니다.</span>
        <button type="button" class="button">
          <i class="fa-solid fa-backward-step"></i>
          <i class="fa-solid fa-play"></i>
          <i class="fa-solid fa-forward-step"></i>
          <i class="fa-solid fa-indent"></i>
        </button>
      </div> -->
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
                <a href="/mypage.php"><i class="fa-solid fa-circle-user"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>