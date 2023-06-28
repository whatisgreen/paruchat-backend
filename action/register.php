<?php // 회원가입 기능
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

    $UserId = $data->userId;
    $UserMail = $data->userMail;
    $UserPassword = $data->userPassword;
    $UserNickname = $data->userNickname;
    $UserCode = $data->userCode;

    $mpw = md5($UserPassword);

    //이미 사용중인 이메일인지 확인
    $FindEmailSql = "SELECT COUNT(*) FROM users WHERE email = '".$UserMail."'";
    $FindSqlRes = mysqli_query($conn, $FindEmailSql);
    $FindEmRess = mysqli_fetch_assoc($FindSqlRes);
    $zero = 0;



    if($FindEmRess['COUNT(*)'] > 0){
        echo "
        <script>
        alert('이미 사용중인 이메일입니다. 로그인 페이지로 이동합니다.');
        
        </script>
        ";
        
echo json_encode(["status" => "fail", "message" => "Unable to register the user!", 'response' => 400]);
    }else{
        //이미 사용중인 아이디 + 코드인지 확인
        $FindIdSql = "SELECT COUNT(*) FROM users WHERE id = '".$UserId."' AND code = '".$UserCode."'";
        $FindIdSqlres = mysqli_query($conn, $FindIdSql);
        $FindIdSqlRows = mysqli_fetch_assoc($FindIdSqlres);

        if($FindIdSqlRows['COUNT(*)'] > 0){
            echo "
            <script>
            alert('이미 사용중인 아이디입니다. 회원가입 페이지로 이동합니다.');
            </script>
            ";
            
echo json_encode(["status" => "fail", "message" => "Unable to register the user!", 'response' => 400]);
        }else{

            $stmt = $conn -> prepare("INSERT INTO users (id, email, nickname, password, code) VALUES (null, ?, ?, ?)");
            $stmt->bind_param("sssi", $UserMail, $UserNickname, $mpw, $UserCode);
            $result = $stmt->execute();            
         

            echo 
            "
            <script>
            alert('회원가입 완료');
            </script>
            ";
            
    echo json_encode(["status" => "success", "message" => "User Inserted", 'response' => 200]);
            
            
        }
    
    }
}else{
    echo 
    "<script>
    alert('데이터 없음');
    </script>";
}


?>