<?php // 로그아웃 기능
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

if($jb_login){
    $_SESSION['username'] = null;
    $jb_login = false;


    echo "<script>
    alert('로그아웃 되었습니다.');
    
    </script>";
    
    echo json_encode(["status" => "success", "message" => "User Inserted", 'response' => 200]);
}else{
echo "<script>
alert('로그아웃된 상태입니다.');
</script>";

echo json_encode(["status" => "fail", "message" => "Unable to register the user!", 'response' => 400]);
}




?>