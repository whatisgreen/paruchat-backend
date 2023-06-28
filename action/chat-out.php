<?php // 채팅방 나가기 기능
    include '../inc/db.php';
    include '../inc/session.php.php';
    
    $room_idx = (int)$_GET['room'];//숫자 말고 입력하면 0으로 반환함
    $sql = "DELETE FROM chat_member WHERE chatroom_id = '".$room_idx."' AND users_id = '".$_SESSION['username']."'";
    $res = mysqli_query($conn, $sql);
    echo 
    "
    <script>
    alert('채팅방 탈퇴 완료');
    location.href = '#';
    </script>
    ";
?>