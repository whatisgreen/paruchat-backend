<?php // 채팅방데이터 열람 사용
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
      $sql = "SELECT * FROM chat WHERE chatroom_id = '".$room_idx."' ORDER BY id ASC";
      $res = mysqli_query($conn, $sql);
      $arr = array();
      while($row = mysqli_fetch_array($res)){
        $ara =  array(
          'result' => 'success',
          'data' => array(
            'id' => $row['id'],
            'users_id' => $row['users_id'],
            'message' => $row['message'],
            'create_at' => $row['create_at']
          )
          );
          array_push($arr, $ara);
      }
  
  
      echo json_encode($arr);
    }
    ?>