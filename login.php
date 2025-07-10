<?php // PHP 파일로 변환됨 ?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <title>로그인</title>
    <link rel="stylesheet" href="./css/login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  </head>

  <body>
    <div id="login-container">
      <h1 class="logo">stob,</h1>

      <input type="text" placeholder="아이디 입력" class="input-field" />
      <input type="password" placeholder="비밀번호 입력" class="input-field" />

      <a href="index.html"><button class="login-btn">로그인하기</button></a>

      <div class="options">
        <span>아이디 찾기&nbsp;&nbsp;|&nbsp;&nbsp;비밀번호 찾기</span>
        <label class="checkbox">
          <input type="checkbox" /><span>아이디 저장</span>
        </label>
      </div>

      <div id="sns-login">
        <p class="sns-title">간편 로그인</p>
        <div id="sns-icons">
          <div class="sns-item">
            <img src="/img/icon_naver.png" alt="" />
            <div class="sns-label">네이버</div>
          </div>
          <div class="sns-item">
            <img src="/img/icon_kakao.png" alt="" />
            <div class="sns-label">카카오</div>
          </div>
          <div class="sns-item">
            <img src="/img/icon_facebook.png" alt="" />
            <div class="sns-label">페이스북</div>
          </div>
          <div class="sns-item">
            <img src="/img/icon_apple.png" alt="" />
            <div class="sns-label">애플</div>
          </div>
        </div>
      </div>

      <a href="join.php"><button id="signup-btn">회원가입</button></a>

      <div class="spacebox"></div>
    </div>
    <footer>
      <div class="menu">
        <div class="box1">
          <a href="/category.html"><i class="fa-solid fa-layer-group"></i></a>
        </div>
        <div class="box2">
          <a href="#none"><i class="fa-solid fa-folder-open"></i></a>
        </div>
        <div class="box3">
          <a href="/index.html"><i class="fa-solid fa-house"></i></a>
        </div>
        <div class="box4">
          <a href="/search.html"
            ><i class="fa-solid fa-magnifying-glass"></i
          ></a>
        </div>
        <div class="box5">
          <a href="/mypage.php"><i class="fa-solid fa-circle-user"></i></a>
        </div>
      </div>
    </footer>
  </body>
</html>
