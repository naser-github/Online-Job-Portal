<?php
session_start();
//$seeker_id = $_SESSION['seeker_id'];
$seeker_email = $_SESSION['seeker_mail'];

include '../db_con.php';

    $sql = "SELECT * FROM seeker WHERE sk_email='$seeker_email' ";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $pdf = $file["sk_pdf"];
    $path = '../sk/uploads/';

    $show = $path.$pdf;

    header('Content-type: application/pdf'); 
    header('Content-Disposition: inline; filename="' .$show. '"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Accept-Ranges: bytes'); 
    @readfile($show); 

?>