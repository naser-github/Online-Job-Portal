<?php
session_start();
//$seeker_id = $_SESSION['seeker_id'];
$seeker_email = $_SESSION['seeker_mail'];

include '../db_con.php';

    $sql = "SELECT * FROM seeker WHERE sk_email='$seeker_email' ";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../sk/uploads/' . $file['sk_pdf'];


    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' .basename($filepath) ); 
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../sk/uploads/' . $file['sk_pdf']));
        readfile('../sk/uploads/' . $file['sk_pdf']);
    }


?>


