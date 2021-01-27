<?php
session_start();

$id= $_SESSION['user_name'];
$s_jid = $_SESSION['s_jid'];

include '../db_con.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>lOOk-for.com</title>
  <link rel="stylesheet" href="../design/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../css/home.css"> -->
    
<style>
    .log{
        font-family:Arial, Helvetica, sans-serif ;
        font-size: 16px;
        font-weight:bold;
    }

    .ctext{
        color: white;
        font-size: 52px;
        font-weight: 500;
        
    }

    .ptext{
        color: white;
        font-size: 18px;
        
    }

    .htext{
        color: rgb(7, 61, 7);
        font-size: 34px;
        font-weight: 500;
        text-align: center;
    }

</style>

</head>
<body>

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="../pic/look-1.png" alt="logo" width="60" height="60"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home-log-emp.php">Home <span class="sr-only">(current)</span></a>
                </li>   
            </ul>
            <ul class="navbar-nav justify-content-end" >
                <li class="nav-item dropdown">
                    <?php
                    if(count($_SESSION) > 0) {
                        echo '<a class="nav-link dropdown-toggle log" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">'.$_SESSION['user_name'].'</a>';
                        }
                    else {
                        $cookie_name = 'username';
                        if(isset($_COOKIE[$cookie_name])) {
                            echo '<a class="nav-link dropdown-toggle log" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">'.$_COOKIE[$cookie_name].'</a>';
                        }else{
                            echo 'no cookies';
                        }
                    }
                    ?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile-emp.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../home.php">Log out</a>
                    </div>
                </li>
                <li >&nbsp; &nbsp;&nbsp; &nbsp;</li>
            </ul>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 block">
            <?php
                $sql= "select * from job_apply natural join seeker where 
                    job_job_id = '$s_jid' and seeker_sk_email = sk_email ";
                
                $isql= $con->query($sql);

                if($isql->num_rows>0){
                    while($row = $isql->fetch_assoc()) {
                    ?><div class="card">
                            <div class="card-header">
                                <?php $seeker_email = $row["sk_email"]; ?>
                         
                                <?php echo "Name: ".$row["sk_name"] ?> <br>
                            </div>
                            <div class="card-body">
                                <?php echo "Email: ".$row["sk_email"] ?> <br> <br>
                                <a href="view-applicant4.php?var=<?php echo $seeker_email;?>" target="blank">View CV</a> <br>
                                <a href="view-applicant3.php?var=<?php echo $seeker_email;?>" target="blank">Download CV</a>
                            </div>
                        </div>
                    <?php
                    }
                }else{
                    echo "No applicants applied for this job";
                }
                ?>

            </div>
            <div class="col-md-2">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 

  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>
