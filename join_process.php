<?php
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
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];

    // 비밀번호 해싱
    $hashed_password = password_hash($user_pw, PASSWORD_DEFAULT);

    // SQL 쿼리 준비
    $sql = "INSERT INTO webdb_user (user_id, user_pw, user_name, user_email) VALUES (:user_id, :user_pw, :user_name, :user_email)";
    $stmt = $conn->prepare($sql);

    // 파라미터 바인딩 (명명된 파라미터 사용)
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':user_pw', $hashed_password);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':user_email', $user_email);

    // 쿼리 실행
    $stmt->execute();

    echo "<script>alert('회원가입이 성공적으로 완료되었습니다.'); location.href='index.html';</script>";

} catch (PDOException $e) {
    // 에러 발생 시
    echo "<script>alert(\"회원가입 중 오류가 발생했습니다: " . $e->getMessage() . "\"); history.back();</script>";
}

// 연결 종료 (PHP 스크립트가 종료되면 자동으로 연결이 닫힘)
$conn = null;
?>