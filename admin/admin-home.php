<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>lOOk-for.com</title>
  <link rel="stylesheet" href="../design/bootstrap.min.css">
  <link rel="stylesheet" href="../css/home.css">

<style>
    .log{
        font-family:Arial, Helvetica, sans-serif ;
        font-size: 16px;
        font-weight:bold;
        }
</style>


</head>
<body>

    <?php
        include '../db_con.php'; 
        if(isset($_POST['title_s'])){
            $name = mysqli_real_escape_string($con,$_POST['title']);
            $name_p=preg_replace("#[^0-9a-z/$@.,;:()\|&*^!?-{}]#i", " ", $name);
            
            $sql = "select * from job where job_title LIKE '%$name_p%' OR job_description LIKE '%$name_p%' OR 
                    job_requirement LIKE '%$name_p%' OR job_deadline LIKE '%$name_p%' OR catagory LIKE '%$name_p%' OR
                    state LIKE '%$name_p%' OR job_location LIKE '%$name_p%' OR cmp_type LIKE '%$name_p%'
                    order by job_id desc" ;
            $isql = $con->query($sql);

            if($isql->num_rows>0){
                session_start();
                $_SESSION['job_title'] = $name;
                header("location:admin-search.php");
            }else{
                ?>
                <script>
                    alert("No such job exist in the directory");
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
                    <a class="nav-link" href="admin-home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-job.php">Jobs</a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="admin-emp.php">Employers</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="admin-seeker.php">Employees</a>
                </li>      
            </ul>
            <ul class="navbar-nav justify-content-end" >
                <li class="nav-item dropdown active">
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
                        <a class="dropdown-item" href="admin-profile.php">View Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../home.php">Log out</a>
                    </div>
                </li>
                <li>
                    &nbsp; &nbsp;
                </li>
            </ul>
        </div>
    </nav>

    <br><br><br><br>
    
    <!-- search bar -->
    <div class="card bg-dark text-white">
        <img src="../pic/home-11.jpg" class="card-img" alt="....." width="60" height="120">
        <div class="card-img-overlay">
        <form class="form-inline my-2 my-lg-0 justify-content-center"
            action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <h3> Find what fits you &nbsp; &nbsp; </h3>
                <input class="form-control mr-sm-2" placeholder="Search"
                type="search" aria-label="Search" name="title">
                <button class="btn btn-outline-white" type="submit" name="title_s">Search</button>
            </form>
            <div>
                <a class="img-overlay active-1" href="admin-home.php">Jobs</a>
                &nbsp; &nbsp; &nbsp; &nbsp;
                <a class="img-overlay" href="admin-cmp.php">Companies</a>
            </div>
        </div>
    </div>

    <br> <br><br> <br><br> <br><br> <br><br>
     
    <!-- catagory -->
    <div class="card">
        <div class="card-header card-home">
            <h4>Catagory</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="afcat/accounting.php" class="catagory-home"> Accounting/Finance </a></li>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Agro (Plant/Animal/Fisheries)</a></li>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Architecture </a>
                    </div> 
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Banking/Non-Banking </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <a href="afcat/commercial.php" class="catagory-home"> Commercial/Supply Chain </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Customer Care </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Data Entry/Operator </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Education</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <a href="afcat/electrician.php" class="catagory-home"> Electrician </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Garments/Textile </a>
                    </div>
                    <div class="col-md-3">
                        <a href="afcat/it.php" class="catagory-home"> IT & Telecommunication </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Law/Legal </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <a href="afcat/medical.php" class="catagory-home"> Medical/Pharma </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> NGO/Development </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Research/Consultancy </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="catagory-home"> Others</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="card-footer-home text-muted"></div>
    </div>
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <!-- div card -->
    <div class="card" style="width: 21rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
    
    <br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- footer -->
    <div class="home-footer">
        <div class"container">
            <div class="row">
                <div class="col-md-4 ">
                    <br>
                    <h5>Terms & Condition</h5>
                    <a class="catagory-home"href="#">Privacy</a>
                </div>
                <div class="col-md-4 ">
                    <br>
                    <h5>Partner</h5>
                    <a class="catagory-home" href="#">sponsor's</a>
                </div>
                <div class="col-md-4 ">
                    <br>
                    <h5>Terms & Condition</h5>
                    <a class="catagory-home"href="#"></a>
                </div>
            </div>
        </div>
    </div>
  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>