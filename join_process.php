<?php
// DB 설정 파일 포함
require_once './conf/db_config.php';

// 폼 데이터 가져오기
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];

// 비밀번호 해시화
$hashed_password = password_hash($user_pw, PASSWORD_DEFAULT);

try {
    // SQL 쿼리 준비
    $stmt = $conn->prepare("INSERT INTO au_users (user_id, user_pw, user_name, user_email) VALUES (:user_id, :user_pw, :user_name, :user_email)");

    // 파라미터 바인딩
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':user_pw', $hashed_password);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':user_email', $user_email);

    // 쿼리 실행
    $stmt->execute();

    echo "회원가입이 성공적으로 완료되었습니다.";

} catch (PDOException $e) {
    // 이미 존재하는 아이디나 이메일인 경우
    if ($e->getCode() == 23000) {
        echo "이미 사용 중인 아이디 또는 이메일입니다.";
    } else {
        echo "회원가입 중 오류가 발생했습니다: " . $e->getMessage();
    }
}

// 데이터베이스 연결 닫기
$conn = null;
?>