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
    
        if(isset($_POST['up'])){
            $c_p = mysqli_real_escape_string($con,$_POST['c_pass']);
            $n_p = mysqli_real_escape_string($con,$_POST['n_pass']);
            $n_cp = mysqli_real_escape_string($con,$_POST['n_cpass']);

            $check_pass = "select * from seeker where sk_email = '$id' and sk_pass = '$c_p' ";
            $query = $con->query($check_pass);

            if ($query->num_rows>0){
                if ($n_p===$n_cp){
                    $sql = "UPDATE seeker SET sk_pass = '$n_p' where sk_email = '$id' ";
                    $isql = $con->query($sql);

                    if($isql===true){
                        ?>
                        <script>
                            alert("password changed");
                        </script>
                        <?php
                    }
                }else{
                    ?>
                    <script>
                        alert("Confirm password & try again!!");
                    </script>
                    <?php
                }
            }
            else{
                ?>
                <script>
                    alert("wrong password!!");
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
    </nav>
    <br><br><br><br>

    <div class="container ">
        <div class="row">
            <div class="col-md-2 left">
            <?php
                $sql = "select * from seeker where sk_email='$id' ";
                $isql = $con->query($sql);

                if ($isql->num_rows > 0) {
                    while($row = $isql->fetch_assoc()) {
                        echo "<h4>Name: {$row["sk_name"]} <h4>";
                    }
                }
                
            ?>
            <br>
            <a class="hof" href="profile-sk.php">View Profile</a>
            <br><br>
            <a class="hof" href="prof-dlt-sk.php">Delete Profile</a>
            </div>


            <div class="col-md-10 right">
                <div class="card border-success card-header mb-3" ">
                <form center action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <h3>&nbsp;Current PASSWORD &nbsp; &nbsp; &nbsp;
                    <input type="password" name="c_pass" placeholder="Input current pass" required> </h3>
                    <br>
                    <h3> &nbsp; &nbsp; &nbsp; New PASSWORD &nbsp; &nbsp; &nbsp;
                    <input type="password" name="n_pass" placeholder="Input new pass" required> </h3>
                    <br>
                    <h3>Confirm PASSWORD &nbsp; &nbsp; &nbsp;
                    <input type="password" name="n_cpass" placeholder="Confirm pass" required> </h3>
                    <br>

                    <div class="btn-group " role="group" aria-label="Basic mixed styles example">
                        <button type="sumbit" name="up" class="btn btn-success pos">Change Password</button>
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