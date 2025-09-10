<?php
// 세션 시작
session_start();

// 데이터베이스 설정 파일 포함
require_once 'conf/db_config.php';

try {
    // PDO 객체 생성 및 연결
    $conn = new PDO($dsn, $username, $password);

    // 에러 모드 설정 (PDOException이 발생하도록)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // POST 데이터 가져오기
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];

    // SQL 쿼리 준비 (Prepared Statement 사용)
    $sql = "SELECT user_id, user_pw FROM webdb_user WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);

    // 파라미터 바인딩
    $stmt->bindParam(':user_id', $user_id);

    // 쿼리 실행
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 사용자가 존재하는지 확인하고 비밀번호 검증
    if ($user && password_verify($user_pw, $user['user_pw'])) {
        // 로그인 성공: 세션에 사용자 정보 저장
        $_SESSION['user_id'] = $user['user_id'];

        echo "<script>alert('로그인 성공!'); location.href='index.html';</script>";
    } else {
        // 로그인 실패
        echo "<script>alert('아이디 또는 비밀번호를 잘못 입력했습니다.'); history.back();</script>";
    }

} catch (PDOException $e) {
    // 에러 발생 시
    echo "<script>alert(\"로그인 중 오류가 발생했습니다: " . $e->getMessage() . "\"); history.back();</script>";
}

// 연결 종료
$conn = null;
?>