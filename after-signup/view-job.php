<?php
session_start();
$id = $_SESSION['user_name'];
$job_id = $_SESSION['job_id'];

include "../db_con.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jobs</title>

    <link rel="stylesheet" href="../design/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/home.css"> -->

    <style>
        .block{
            border-right: 2px solid;
            display: block;
        }
        .bb{
            color: white;
            text-decoration: none;
        }
        .bb:hover{
            text-decoration: none;
            color: yellow;
        }
        .bt{
            left: 85%;

        }
    </style>

</head>

<body>

    <?php
        if(isset($_POST['apply'])){
            $sql2 = "INSERT INTO job_apply (seeker_sk_email, job_job_id) VALUES ('$id','$job_id') ";
            $isql2 = $con->query($sql2);

            if ($isql2===true){
                ?>
                <script>
                    alert("Applied");
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Already Applied");
                </script>
                <?php
            }
        }
    ?>

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
                    <a class="nav-link" href="../home-logged.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home-logged-job.php">Jobs</a>
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
                        <a class="dropdown-item" href="../sk/profile-sk.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../home.php">Log out</a>
                    </div>
                </li>
    </nav>


    <br> <br> <br> 

    <div class="container block">
        <div class="row">
            <div class="col-md-10 block">
                <div class="card">
                <?php
                    $sql = "select * from job where job_id = '$job_id' ";
                    $isql = $con->query($sql);

                    if ($isql->num_rows>0){
                        while($row = $isql->fetch_assoc()) { ?>
                        <div class="card-header"> <?php
                            $job = $row["job_id"];
                            echo "<h2> {$row["job_title"]} <h2>";
                            echo "<h5> {$row["cmp_name"]} </h5> ";
                        ?> </div> <div class="card-body"> <?php 
                            echo "<h6> Vacancy </h6>";
                            echo " &nbsp; &nbsp; {$row["vacancy"]} <br> <br>";
                            echo "<h6> Job Responsibilities </h6>";
                            echo " &nbsp; &nbsp; {$row["job_description"]} <br><br>";
                            echo "<h6>Job Requirements</h6> ";
                            echo " &nbsp; &nbsp; {$row["job_requirement"]} <br><br>";
                            echo "<h6>Job Location</h6>";
                            echo " &nbsp; &nbsp; {$row["job_location"]} <br><br>";
                            echo "<h6>Salary</h6>";
                            echo " &nbsp; &nbsp; {$row["salary"]} <br><br>";
                            echo "<h5>Deadline</h5>";
                            echo " &nbsp; &nbsp; {$row["job_deadline"]} <br><br>";
                        ?></div> </div> <?php
                        }
                    }
                ?>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                    <div class="btn btn-group btn-group-lg bt" role="group" aria-label="Basic mixed styles example">
                        <button type="submit" name="apply" class="btn btn-dark">
                            Apply
                        </button>
                    </div>
                
                </form>
                
                <div class="card-footer text-muted">
                    <center>
                    ..................
                </div>

            </div>
            <div class="col-md-2">
                <div class="card" style="width: 10rem;">
                    <img src="..." class="card-img-top" alt="Wanna place ad here">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card" style="width: 10rem;">
                    <img src="..." class="card-img-top" alt="Wanna place ad here">
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