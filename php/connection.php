<?php
    // $host = "localhost";
    // $user = "root";
    // $pw = "1234";
    // $dbName = "forumDB";
    // $dbConnect = new mysqli($host, $user, $pw, $dbName);
    // $dbConnect->set_charset("utf8");

    // if (mysqli_connect_errno()) {
    //     echo "database 접속 실패";
    // }

    //Get Heroku ClearDB connection information

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$dbConnect = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    if (mysqli_connect_errno()) {
        echo "database 접속 실패";
    }

?>