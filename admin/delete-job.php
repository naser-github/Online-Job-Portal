<?php
session_start();
$job_id = $_SESSION['job_id'];

include "../db_con.php";

    $sql = "DELETE FROM job_apply WHERE job_job_id = '$job_id' ";
    $isql = $con->query($sql);
    
    if($isql===true){
        $sql2 = "DELETE FROM job WHERE job_id = '$job_id' ";
        $isql2 = $con->query($sql2);
    
        if($isql2===true){
            ?>
            <script>
                alert("Deleted");
            </script>
            <?php
            header("location:admin-job.php");
        }else{
            ?>
            <script>
                alert("Error!!!");
            </script>
            <?php
        }
    }

?>