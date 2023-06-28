<?php // 채팅방 나가기 기능
    include '../inc/db.php';
    include '../inc/session.php.php';
    
    $user_idx = (int)$_GET['user_idx'];//숫자 말고 입력하면 0으로 반환함
    $room = (int)$_GET['room'];//숫자 말고 입력하면 0으로 반환함
    $stmt = $conn -> prepare("INSERT INTO chat_member (chatroom_id, users_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_idx, $room);
    $result = $stmt->execute();
    
    echo "
    <script>
    alert('초대 완료');
    location.href = '#';
    </script>
    ";
?>