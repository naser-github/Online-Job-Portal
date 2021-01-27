<?php
    session_start();
    $emp_mail = $_GET['var'];
    $_SESSION['emp_mail'] = $emp_mail;

    header("location:admin-emp3.php");

?>