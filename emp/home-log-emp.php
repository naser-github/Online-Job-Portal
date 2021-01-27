<?php
session_start();

if ( $_SESSION['alert']==='Posted successfully.'){
    $_SESSION['alert'] === 'not';
    ?>
    <script>
    alert("Posted successfully.");
    </script>
    <?php
}

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

    .home-footer{
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100px;
        background-color:darkgray;
        color: white;
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

    <p class="htext">Forget about traditional hiring process, your subordinates are one click away. </p>
    <br>

    <br><br><br><br>

    <!-- card -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title ctext">Post a job</h5>
                        <p class="card-text ptext">
                            Hire with confidence. Post a job on our site to access more talent. 
                        </p>
                        <a href="post-job.php" class="btn btn-light">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title ctext">Manage posts</h5>
                        <p class="card-text ptext">
                        Effectively manage your job postings,communicating with applicants, and basic billing information.
                        </p>
                        <a href="manage-job.php" class="btn btn-light">Click Here</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h5 class="card-title ctext">Applicants</h5>
                        <p class="card-text ptext">
                        Check applied applicants.
                        </p>
                        <a href="view-applicant.php" class="btn btn-light">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br><br><br><br>
    <!-- footer -->
    <div class="home-footer">
        <p>Footer</p>
    </div>

  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>
