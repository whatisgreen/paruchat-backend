<?php  // 전체유저 검색사이트 - 초대할때 사용
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include '../inc/db.php';
    include '../inc/session.php.php';

    
    $sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['username']."'";
    $res = mysqli_query($conn, $sql);
    $arr = array();
    while($row = mysqli_fetch_array($res)){
      $ara =  array(
        'result' => 'success',
        'data' => array(
          'users_id' => $row['id'],
          'users_email' => $row['email'],
          'users_nickname' => $row['nickname'],
          'users_code' => $row['code']
        )
        );
        array_push($arr, $ara);
    }


    echo json_encode($arr);

    ?>