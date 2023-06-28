<?php // 채팅방 초대 기능


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

    $user_idx = $data->user_idx; //숫자 말고 입력하면 0으로 반환함
    $room = $data->$room; //숫자 말고 입력하면 0으로 반환함
    $stmt = $conn->prepare("INSERT INTO chat_member (chatroom_id, users_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_idx, $room);
    $result = $stmt->execute();
    
    if($result){

        echo 
        "<script>
        alert('초대 완료');
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