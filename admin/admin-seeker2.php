<?php
    session_start();
    $seeker_mail = $_GET['var'];
    $_SESSION['seeker_mail'] = $seeker_mail;

    header("location:admin-seeker3.php");

?>