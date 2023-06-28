<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include '../inc/session.php';
    include '../inc/db.php';




    $TagArray = $_POST['tag'];
    date_default_timezone_set("Asia/Seoul");

    $UserId = $_POST['UserId'];
    $UserMail = $_POST['UserMail'];
    $UserPassword = $_POST['Password'];
    $UserNickname = $_POST['Nickname'];
    $UserCode = $_POST['code'];

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
        location.href = '#';
        </script>
        ";
    }else{
        //이미 사용중인 아이디 + 코드인지 확인
        $FindIdSql = "SELECT COUNT(*) FROM users WHERE id = '".$UserId."' AND code = '".$UserCode."'";
        $FindIdSqlres = mysqli_query($conn, $FindIdSql);
        $FindIdSqlRows = mysqli_fetch_assoc($FindIdSqlres);

        if($FindIdSqlRows['COUNT(*)'] > 0){
            echo "
            <script>
            alert('이미 사용중인 아이디입니다. 회원가입 페이지로 이동합니다.');
            location.href = '#';
            </script>
            ";
        }else{

            $stmt = $conn -> prepare("INSERT INTO users (id, email, nickname, password, code) VALUES (null, ?, ?, ?)");
            $stmt->bind_param("sssi", $UserMail, $UserNickname, $mpw, $UserCode);
            $result = $stmt->execute();            
         

            echo 
            "
            <script>
            alert('회원가입 완료');
            location.href = '#';
            </script>
            ";

            
            
        }
    
    }


    
    
    
    
    
    
    ?>
</body>
</html>