<?php
session_start();
include "../db_con.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobs</title>

    <link rel="stylesheet" href="../design/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/home.css"> -->

    <style>
        .bcumb{
            color:rgb(7, 61, 7);
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
                <li class="nav-item">
                    <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Jobs</a>
                </li>
            </ul>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Sign Up
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../home-sign/sign-up-sk.php">As an Seeker</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../home-sign/sign-up-emp.php">As an Employee</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-job" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        &nbsp; &nbsp; &nbsp; &nbsp; Sign In
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../home-sign/sign-in-sk.php">As an Seeker</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../home-sign/sign-in-emp.php">As an Employee</a>
                    </div>
                </li>
                <li>&nbsp; &nbsp; &nbsp; &nbsp;</li>
            </ul>
        </div>
    </nav>
    <br> <br> <br>

    <div class="container">
        <div class="row">
            <div class="col-md-10 block">
            <?php
                $sql= "select * from job where catagory= 'electrician' ";
                $isql= $con->query($sql);

                if($isql->num_rows>0){
                    while($row = $isql->fetch_assoc()) {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <?php $job_id = $row["job_id"]; ?>
                                <a href="../before-signup/job-view.php?var=<?php echo $job_id;?>"> <?php echo $row["job_title"] ?> </a>
                            </div>
                            <div class="card-body">
                                <?php echo "Location: ".$row["job_location"] ?> <br>
                                <?php echo "Requirement: ".$row["job_requirement"] ?> <br>
                                <?php echo "Deadline- ".$row["job_deadline"] ?> <br>
                            </div>
                        </div>
                    <?php
                    }
                }
            ?>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 12rem;">
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