<?php // 일지목록 출력 페이지
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
        
    $sql = "SELECT * FROM record WHERE chatroom.id = '".$room_idx."'";
    $res = mysqli_query($conn, $sql);
    $arr = array();
    while($row = mysqli_fetch_array($res)){
      $ara =  array(
        'result' => 'success',
        'data' => array(
          'record_id' => $row['id'],
          'users_id' => $row['users_id'],
          'record_title' => $row['title'],
          'record_content' => $row['content'],
          'record_createDate' => $row['create_at'],
          'record_showWritter' => $row['show_writer']
        )
        );
        array_push($arr, $ara);
    }


    echo json_encode($arr);
      }
    ?>