<?php // 일지 삭제 기능
    include '../inc/db.php';
    include '../inc/session.php.php';
    
    $room_idx = (int)$_GET['room'];//숫자 말고 입력하면 0으로 반환함
    $log_idx = (int)$_GET['log_idx'];//숫자 말고 입력하면 0으로 반환함

    $sql = "DELETE FROM record WHERE chatroom_id = '".$room_idx."' AND id = '".$log_idx."'";
    $res = mysqli_query($conn, $sql);
    echo 
    "
    <script>
    alert('일지 삭제 완료');
    location.href = '#';
    </script>
    "
?>