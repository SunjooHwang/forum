<?php
    // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';
    // include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';
    include '../connection.php';
    include '../session.php';

    $email = $_POST['userEmail'];
    $pw = $_POST['userPw'];

    $sql = "SELECT memberID, email FROM member ";
    $sql .= "WHERE email = '{$email}' AND pw = '{$pw}'";
    $result = $dbConnect->query($sql);

    function showAlert($alert) {
        echo '<script type="text/javascript"> alert("'.$alert.'")</script>';
    }

    if ($result) {
        if ($result->num_rows == 0) {
            showAlert('로그인 정보가 일치하지 않습니다.');
            exit;
        } else {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['memberID'] = $memberInfo['memberID'];            
            Header("Location: ../../index.php");
        }
    } else {
        echo "ERROR!!!";
        exit;
    }

?>