<?php // 채팅방 목록 
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    
    include '../inc/db.php';
    include '../inc/session.php.php';


    $room_idx = (int)$_GET['room'];//숫자 말고 입력하면 0으로 반환함

    if($room_idx == 0){
        echo "<script>
          alert('잘못된 접근입니다.');
          history.back();
        </script>";
      }else{
        
    $sql = "SELECT * FROM chatroom WHERE chatroom.id = '".$room_idx."'";
    $res = mysqli_query($conn, $sql);
    $arr = array();
    while($row = mysqli_fetch_array($res)){
      $ara =  array(
        'result' => 'success',
        'data' => array(
          'chatroom_id' => $row['chat_member.chatroom_id'],
          'chatroom_name' => $row['chatroom.name'],
          'chatroom_last_message' => $row['chatroom.last_message']
        )
        );
        array_push($arr, $ara);
    }


    echo json_encode($arr);
      }
    ?>