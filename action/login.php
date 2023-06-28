<?php // 로그인 기능
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

    $id = $data->userEmail;//유저아이디
    $pw = $data->userPassword;//유저비밀번호
    $mpw = md5($pw);

    $sql = "SELECT * FROM users WHERE email = '".$id."'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    

   
    if(mysqli_num_rows($result) == 0){
        echo 
        "<script>
        alert('해당 아이디가 존재하지 않습니다.');
        </script>";
        
echo json_encode(["status" => "fail", "message" => "Unable to register the user!", 'response' => 400]);
    }else{
        if($rows['password'] == $mpw){
            $_SESSION['username'] = $rows['id'];
            echo 
            "<script>
            alert('로그인 완료');
            </script>";
            
    echo json_encode(["status" => "success", "message" => "User Inserted", 'response' => 200]);
        }else{
            echo 
        "<script>
        alert('비밀번호가 틀렸습니다.');
        </script>";
            
echo json_encode(["status" => "fail", "message" => "Unable to register the user!", 'response' => 400]);
    }
    }


}else{
    echo 
    "<script>
    alert('데이터 없음');
    </script>";
}


?>