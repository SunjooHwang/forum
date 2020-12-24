<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['userEmail'];
    $userName = $_POST['userName'];
    $pw = $_POST['userPw'];
    $pwChk = $_POST['userPwChk'];

    function showAlert($alert) {
        echo '<script type=text/javascript> alert("'.$alert.'")</script>';
    }

    //이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT email FROM member WHERE email = '{$email}'";
    $result = $dbConnect->query($sql);

    if ($result) {
        $count = $result->num_rows;
        if ($count == 0) {
            $isEmailCheck = true;
        } else {
            showAlert("이미 존재하는 이메일입니다.");
            exit;
        }
    } else {
       showAlert("email 입력 실패");
        exit;
    }

    //패스워드 일치 검사
    $isPwCheck = false;

   if ($pw == $pwChk) {
       $isPwCheck = true;
   } else {
       showAlert("비밀번호가 일치하지 않습니다.");
       exit;
   }

   if ($isEmailCheck == true && $isPwCheck == true) {
       $regTime = time();
       
       $sql = "INSERT INTO member (firstName, lastName, email, username, pw, regTime)";
       $sql .= "VALUES ('{$firstName}','{$lastName}','{$email}','{$userName}','{$pw}',{$regTime})";
       
       $result = $dbConnect->query($sql);

       if ($result) {
           $_SESSION['memberID'] = $dbConnect->insert_id;
           $_SESSION['email'] = $email;
           Header("Location:./signUpSuccess.php");
       } else {
           showAlert("회원가입 실패");
           exit;
       }
   }

?>