<?php // 채팅방 목록 
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include '../inc/db.php';
    include '../inc/session.php.php';

    $sql = "SELECT * FROM chat_member, chatroom WHERE chat_member.users_id = '".$_SESSION['username']."' AND chat_member.chatroom_id = chatroom.id";
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

    ?>