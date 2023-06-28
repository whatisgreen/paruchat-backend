<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include '../inc/db.php';
    include '../inc/session.php.php';

    $room_idx = (int)$_GET['room'];//방번호 : 숫자 말고 입력하면 0으로 반환함
    if($room_idx == 0){
      echo "<script>
        alert('잘못된 접근입니다.');
        history.back();
      </script>";
    }else{
    $sql = "SELECT * FROM chat_members, users WHERE chat_members.chatroom_id = '".$room_idx."' AND chat_members.chat_member = users.id";
    $res = mysqli_query($conn, $sql);
    $arr = array();
    while($row = mysqli_fetch_array($res)){
      $ara =  array(
        'result' => 'success',
        'data' => array(
          'users_id' => $row['users.id'],
          'users_email' => $row['users.email'],
          'users_nickname' => $row['users.nickname'],
          'users_code' => $row['users.code']
        )
        );
        array_push($arr, $ara);
    }


    echo json_encode($arr);
    }
    ?>