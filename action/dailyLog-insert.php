
<?php // 일지 삽입 기능
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

   
    date_default_timezone_set("Asia/Seoul");


    $logRoom = $data->logRoom;
    $logTitle = $data->logTitle;
    $logDate = $data->logDate;
    $logContent = $data->logContent;

    $stmt = $conn -> prepare("INSERT INTO record (id, chatroom_id, users_id, title, content, create_at) 
    VALUES (null, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $logRoom, $_SESSION['username'], $logTitle, $logContent, $logDate);
    $result = $stmt->execute();
   
    
    if($result){

        echo 
        "<script>
        alert('일지 삽입 완료');
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