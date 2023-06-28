<?php // 일지 삭제 기능
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 3600");
//header("Access-Control-Allow-Headers: Content-Type, Authorization");
//header("Access-Control-Allow-Headers: Origin, Accept, X-Requested-With, Content-Type, Access-Control-Allow-Headers, Authorization");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

include '../inc/db.php';
include '../inc/session.php.php';

if(isset($data) && !empty($data)){

   
    $room_idx = $data->room_idx;//숫자 말고 입력하면 0으로 반환함
    $log_idx = $data->log_idx;//숫자 말고 입력하면 0으로 반환함

    $sql = "DELETE FROM record WHERE chatroom_id = '".$room_idx."' AND id = '".$log_idx."'";
    $res = mysqli_query($conn, $sql);
   
    
    if($result){

        echo 
        "<script>
        alert('일지 삭제 완료');
        </script>";
        
        echo json_encode(["status" => "success", "message" => "User Inserted", 'response' => 200]);
        
        }else{
            echo json_encode(["status" => "fail", "message" => "Unable to register the user!", 'response' => 400]);
        }
}else{
    echo 
    "<script>
    alert('데이터 없음');
    </script>";
}


?>