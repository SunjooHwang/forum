<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/connection.php';

    $sql = "CREATE TABLE forumBoard(";
    $sql .= "boardID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "title varchar(50) NOT NULL,";
    $sql .= "content longtext NOT NULL,";
    $sql .= "regTime int(10) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (boardID)";
    $sql .= ") CHARSET=utf8";

    $res = $dbConnect->query($sql);

    if ($res) {
        echo 'table 생성 완료';
    } else {
        echo 'ERROR';
    }
?>