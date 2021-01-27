<?php
session_start();
$id = $_SESSION['user_name'];

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
    .po{
        position: relative;
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
                <li class="nav-item ">
                    <a class="nav-link" href="../home-logged.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../after-signup/home-logged-job.php">Jobs</a>
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
                $sql = "select * from seeker where sk_email='$id' ";
                $isql = $con->query($sql);

                if ($isql->num_rows > 0) {
                    while($row = $isql->fetch_assoc()) {
                        echo "<h4>{$row["sk_name"]} <h4>";
                        $name = $row["sk_name"];
                        $file = $row["sk_pdf"];
                    }
                }
                $path = 'uploads/' ;
                 
            ?>
            <br>
            <a class="hof" href="apply-job-sk.php">Applied Job</a>
            <br><br>
            <a class="hof" href="make-cv.php" target="blank">Create CV</a>
            <br><br>
            <a class="hof" href="upload_cv.php">Upload CV</a>
            <br><br>
            <a class="hof" href="down.php">Download CV</a>
            <br><br>
            <a class="hof" href="prof-edit2.php">Edit Profile</a>
            <br><br>
            <a class="hof" href="prof-edit-sk.php">Edit Password</a>
            <br><br>
            <a class="hof" href="prof-dlt-sk.php">Delete Profile</a>
            </div>
            <div class="col-md-10">
                <?php
                    if(is_null($file)){
                        echo "<h2> Hello <?php echo $name;  ?>, </h2> <br> <br> <br> <br>";
                        ?>
                        <h3 style="padding-left:25%">NO CV has been uploaded.</h3> <br>
                        <?php 
                    }else{
                        ?>
                        <iframe class="responsive-iframe" src="<?php echo $path.$file; ?>" width="90%" height="500px">
                        </iframe>
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>

  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>