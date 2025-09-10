<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>로그인</h1>
    </header>

    <nav class="navbar">
        <div class="hamburger-menu" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="nav-links-wrapper">
            <ul class="nav-links">
                <li><a href="index.html">홈</a></li>
                <li><a href="login.html">로그인</a></li>
                <li><a href="join.html">회원가입</a></li>
                <li><a href="add_song.html">곡 추가</a></li>
            </ul>
        </div>
    </nav>

    <div class="login-form-container">
        <h2>로그인</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="user_id">아이디</label>
                <input type="text" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="user_pw">비밀번호</label>
                <input type="password" id="user_pw" name="user_pw" required>
            </div>
            <button type="submit" class="btn-login">로그인</button>
        </form>
    </div>

</body>

</html>