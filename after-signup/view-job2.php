<?php
    session_start();
    $job_id = $_GET['var'];
    $_SESSION['job_id'] = $job_id;

    header("location:view-job.php");

?>