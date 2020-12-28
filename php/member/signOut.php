<?php
    include $_SERVER['DOCUMENT_ROOT'].'/forum/php/session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['email']);
    unset($_SESSION['userName']);
    Header($_SERVER['DOCUMENT_ROOT'].'/forum/index.php');
    // exit;
?>