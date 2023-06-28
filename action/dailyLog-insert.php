<?php // 채팅방데이터 열람 사용
    include '../inc/db.php';
    include '../inc/session.php.php';
    date_default_timezone_set("Asia/Seoul");


    $logRoom = $_POST['room'];
    $logTitle = $_POST['logTitle'];
    $logDate = $_POST['logDate'];
    $logContent = $_POST['logContent'];

    $stmt = $conn -> prepare("INSERT INTO record (id, chatroom_id, users_id, title, content, create_at) 
    VALUES (null, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $logRoom, $_SESSION['username'], $logTitle, $logContent, $logDate);
    $result = $stmt->execute();

    echo 
    "
    <script>
    alert('일지 생성 완료');
    location.href = '#';
    </script>
    ";
?>