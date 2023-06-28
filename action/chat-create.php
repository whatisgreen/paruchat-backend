<?php // 채팅방데이터 열람 사용

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
    date_default_timezone_set("Asia/Seoul");


    if(isset($data) && !empty($data)){
        $chatRoomName = $data->chatRoomName;

        $stmt = $conn -> prepare("INSERT INTO chatroom (id, name, last_message, create_at) VALUES (null, ?, null, now())");
        $stmt->bind_param("s", $chatRoomName);
        $result = $stmt->execute();

        if($result){

        echo 
        "<script>
        alert('방 생성 완료');
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

    


    
