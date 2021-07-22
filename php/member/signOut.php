<?php
    include '../session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['email']);
    Header("Location:../../index.php");
    
?>