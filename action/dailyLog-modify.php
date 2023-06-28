<?php // 채팅방데이터 열람 사용
    include '../inc/db.php';
    include '../inc/session.php.php';
    date_default_timezone_set("Asia/Seoul");

    $logIdx = $_POST['logIdx'];
    $logRoom = $_POST['room'];
    $logTitle = $_POST['logTitle'];
    $logDate = $_POST['logDate'];
    $logContent = $_POST['logContent'];

    $stmt = $conn -> prepare("UPDATE record SET title = ?, content = ?, create_at = ? WHERE id = '?'");
    $stmt->bind_param("sssi", $logTitle, $logContent, $logDate, $logIdx);
    $result = $stmt->execute();

    echo 
    "
    <script>
    alert('일지 수정 완료');
    location.href = '#';
    </script>
    ";
?>