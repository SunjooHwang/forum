<?php


    include '../connection.php';
    include '../session.php';
    include '../checkSignSession.php';

    $title = $_POST['title'];
    $content = $_POST['content'];

    $memberID = $_SESSION['memberID'];
    $regTime = time();

    $sql = "INSERT INTO forumboard (memberID, title, content, regTime)";
    $sql .= "VALUES ('{$memberID}', '{$title}', '{$content}', {$regTime})";
    $result = $dbConnect->query($sql);

    if ($result) {
        Header("Location:./forumBoardList.php");
        exit;
    } else {
        echo "ERROR! FAILED TO SAVE";
        exit;
    }
?>