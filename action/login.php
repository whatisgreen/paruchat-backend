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
    include '../inc/session.php'; //세션 연결코드
    include '../inc/db.php';//DB 연결코드
    
    $id = $_POST['UserEmail'];//유저아이디
    $pw = $_POST['Password'];//유저비밀번호
    $mpw = md5($pw);

    $sql = "SELECT * FROM users WHERE email = '".$id."'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    

   
    if(mysqli_num_rows($result) == 0){
        echo 
        "<script>
        alert('해당 아이디가 존재하지 않습니다.');
        location.href = '#';
        </script>";
    }else{
        if($rows['password'] == $mpw){
            $_SESSION['username'] = $rows['id'];
            echo 
            "<script>
            alert('로그인 완료');
            location.href = '#';
            </script>";
        }else{
            echo 
        "<script>
        alert('비밀번호가 틀렸습니다.');
        location.href = '#';
        </script>";
        }
    }



    
    ?>
</body>
</html>