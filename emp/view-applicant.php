<?php
session_start();
$id = $_SESSION['user_name'];
include "../db_con.php"

?>
<!DOCTYPE html>
<html>
<head>
	<title>lOOk-for.com</title>
  <link rel="stylesheet" href="../design/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../css/home.css"> -->
    
<style>
    .mar{
        margin-left: 3%;
    }

</style>

</head>
<body>

    <?php
    if(isset($_POST['see'])){
        $s_jid = $_POST['see_jid'];

        $_SESSION['s_jid'] = $s_jid;

        header("location:view-applicant2.php");
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
    <br><br><br>

    

    <div class="container">
        <div class="row">
            <div class="col-md-10 block">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="btn-group bb" role="group" aria-label="Basic mixed styles example">
                        <h2>Enter Job ID to see the applicants &nbsp; &nbsp; &nbsp;  <h6>
                        <input type="text" name="see_jid" placeholder="Input Job Id" required>
                        &nbsp; &nbsp;
                        <button type="sumbit" name="see" class="btn btn-primary">Show applicants</button>
                        </h6> </h2>
                    </div>
                </form>
                <br>
            <?php
                $sql = "select * from job where employee_emp_email='$id'";
                $isql= $con->query($sql);

                if($isql->num_rows>0){
                    while($row = $isql->fetch_assoc()) {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                Job ID: &nbsp; <?php echo $row["job_id"]; ?>
                            </div>
                            <div class="card-body">
                                Job Tittle &nbsp;  <?php echo $row["job_title"] ?> <br> <br>
                                <?php echo "Description: ".$row["job_description"] ?> <br>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <br><br>

                    <?php
                }else {
                    echo "<h2> Nobody applied yet</h2>";
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

    <br><br>


  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>
