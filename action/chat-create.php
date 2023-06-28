<?php // 채팅방데이터 열람 사용
    include '../inc/db.php';
    include '../inc/session.php.php';
    date_default_timezone_set("Asia/Seoul");



    $chatRoomName = $_POST['roomName'];

    $stmt = $conn -> prepare("INSERT INTO chatroom (id, name, last_message, create_at) VALUES (null, ?, null, now())");
    $stmt->bind_param("s", $chatRoomName);
    $result = $stmt->execute();

    echo 
    "
    <script>
    alert('방 생성 완료');
    location.href = '#';
    </script>
    ";
?>