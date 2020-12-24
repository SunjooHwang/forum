<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';

    $sql = "CREATE TABLE member (";
    $sql .= "firstName varchar(15) NOT NULL,";
    $sql .= "lastName varchar(20) NOT NULL,";
    $sql .= "memberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "email varchar(40) UNIQUE NOT NULL,";
    $sql .= "pw varchar(40) DEFAULT NULL,";
    $sql .= "regTIme int(11) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") CHARSET=utf8";

    $res = $dbConnect->query($sql);

    if ($res) {
        echo "table 생성 완료";
    } else {
        echo "table 생성 실패";
    }
?>