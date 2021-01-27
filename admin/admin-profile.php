<?php
session_start();
$id= $_SESSION['user_name'];

include '../db_con.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>lOOk-for.com</title>
  <link rel="stylesheet" href="../design/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../css/home.css"> -->
    
    <style>
        .block{
            border-right: 2px solid;
            display: block;
        }
        .hof{
            color: black;
        }
        .hof:hover{
            color: red;
            text-decoration:none;
        }
        .catagory-home{
            color:rgb(7, 61, 7);
            font-family:Arial, Helvetica, sans-serif ;
            font-size: 24px;
            font-weight:bold;
            padding-left: 240px;
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
                    <a class="nav-link" href="admin-home.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-job.php">Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-emp.php">Employers <span class="sr-only">(current)</span></a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="admin-seeker.php">Employees</a>
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
                        <a class="dropdown-item" href="../home.php">Log out</a>
                    </div>
                </li>
    </nav>
    <br><br><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-2 block">
                <?php
                    $sql = "select * from admin where ad_email='$id' ";
                    $isql = $con->query($sql);

                    if ($isql->num_rows > 0) {
                        while($row = $isql->fetch_assoc()) {
                            echo "<h4>{$row["ad_name"]} <h4>";
                            $name = $row["ad_name"];
                        }
                    }   
                ?>
                <br>
                <a class="hof" href="prof-edit-ad2.php">Edit Profile</a>
                <br> <br>
                <a class="hof" href="prof-edit-ad.php">Edit Password</a>
                <br> <br>
                <a class="hof" href="deactivate-ad.php">Deactivate Account</a>
            <br><br>
            </div>
            <div class="col-md-10">
                <h2> Hello <?php echo $name;  ?>, </h2> <br> <br> <br>
                <h3 style="padding-left: 25%;">Want to add another admin? <br> <br>
                    <a class='catagory-home' href="add-admin.php"> Click here. </a>
                </h3>
            </div>
        </div>
    </div>

  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>