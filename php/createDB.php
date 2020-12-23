<?php
    $host = "localhost";
    $user = "root";
    $pw ="1234";

    $dbConnect = new mysqli($host, $user, $pw);

    $dbConnect->set_charset("utf-8");

    if (mysqli_connect_errno()) {
        echo 'database 접속 실패';
    } else {
        $sql = "CREATE DATABASE forumDB";
        $res = $dbConnect->query($sql);

        if ($res) {
            echo "database 생성 완료";
        } else {
            echo "database 생성 실패";
        }
    }

?>