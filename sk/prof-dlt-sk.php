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
    .left{
        border-right: 2px solid;
        display: block;
    }
    .right{
        padding-left: 40px;
    }
    .pos{
        left: 500px;
    }
    .hof{
        color: black;
    }
    .hof:hover{
        color: red;
        text-decoration:none;
    }

</style>

</head>
<body>
    <?php
    
        if(isset($_POST['dlt'])){
            $c_p = mysqli_real_escape_string($con,$_POST['c_pass']);

            $check_pass = "select * from seeker where sk_email = '$id' and sk_pass = '$c_p' ";
            $query = $con->query($check_pass);

            if ($query->num_rows>0){

                $sql="DELETE FROM job_apply WHERE seeker_sk_email = '$id' ";
                $isql = $con->query($sql);

                if ($isql === true){
                    $sql = "DELETE FROM seeker WHERE sk_email = '$id' and sk_pass = '$c_p' ";
                    $isql = $con->query($sql);

                    if($isql===TRUE){
                        ?>
                        <script>
                            alert("Deleted");
                        </script>
                        <?php
                        header("location:../home.php");
                    }else{
                        ?>
                        <script>
                            alert(" Error!!! ");
                        </script>
                        <?php
                    }
                }
                
            }else{
                ?>
                <script>
                    alert("Wrong Password!!");
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
                <li >&nbsp; &nbsp;&nbsp; &nbsp;</li>
            </ul>
    </nav>
    <br><br><br><br>

    <div class="container ">
        <div class="row">
            <div class="col-md-2 left">
            <?php
                $sql = "select * from employee where emp_email='$id' ";
                $isql = $con->query($sql);

                if ($isql->num_rows > 0) {
                    while($row = $isql->fetch_assoc()) {
                        echo "<h4>Name: {$row["emp_name"]} <h4>";
                    }
                }
                
            ?>
            <br>
            <a class="hof" href="profile-sk.php">View Profile</a>
            <br><br>
            <a class="hof" href="prof-edit-sk.php">Edit Password</a>
            </div>


            <div class="col-md-10 right">
                <div class="card border-success card-header mb-3" ">
                <form center action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <h3>&nbsp; &nbsp;&nbsp; Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="email" name="email" placeholder="Input Email" required> </h3>
                    <br>
                    <h3> &nbsp; &nbsp; &nbsp;PASSWORD &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="password" name="c_pass" placeholder="Input Password" required> </h3>
                    <br>  
                    <div class="right">
                    <input type="checkbox" name="agree" required>
                        <label for="agree"> I agree all the terms</label><br>
                    </div>
                    <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                        <button type="sumbit" name="dlt" class="btn btn-danger pos">Delete</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>