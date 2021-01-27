<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="../design/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/home-sign.css">

    <style> 
        .box{
            height: 450px;
        }
    </style>
    
</head>
<body>

<?php
include '../db_con.php';
    if(isset($_POST['submit'])){
        $ad_user = mysqli_real_escape_string($con,$_POST['ad_user']); 
        $email = mysqli_real_escape_string($con,$_POST['ad_mail']);
        $pass = mysqli_real_escape_string($con,$_POST['ad_pass']);

        if(isset($_POST['remember'])){
            $cookie_name = 'username';
            $cookie_value = $email;

            setcookie($cookie_name,$cookie_value, time() + 2*60, "/");
            $_SESSION['user_id'] = $ad_user;
            $_SESSION['user_name'] = $email;
        }else{
            $_SESSION['user_id'] = $ad_user;;
            $_SESSION['user_name'] = $email;
        }
        
        $check_email = "select * from admin where ad_email = '$email' and ad_pass = '$pass' and ad_username='$ad_user'";
        $query = $con->query($check_email);

        if ($query->num_rows>0){
            ?>
            <script>
                alert("Log In Successful");
            </script>
            <?php
            header("location:../admin/admin-home.php");
        }else{
            ?>
            <script>
                alert("Email or Password or Username do not matched");
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
                    <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../before-signup/home-job.php">Jobs</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a class="bcumb"href="../home.php">Home</a></li>
        <li class="breadcrumb-item active">Sign In</li>
    </ol>

    <!-- sign in box -->
    <div class="sign-box box">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <br><br>
            User Name <br>
            <input class="form-control mr-sm-2" name="ad_user" type="text" placeholder="User Name"> <br>
            Email <br>
            <input class="form-control mr-sm-2" name="ad_mail" type="email" placeholder="Email"> <br>
            Password <br>
            <input class="form-control mr-sm-2" name="ad_pass" type="password" placeholder="Password"> <br>
            <input type="checkbox" name="remember">
            <label for="remember"> Remember me</label><br>
            <button class="btn btn-outline-white" type="submit" name="submit">Log In</button> <br><br>

        </form>
    </div>


 <script src="../design/jquery-3.5.1.slim.min.js"></script>
 <script src="../design/popper.min.js"></script>
 <script src="../design/bootstrap.min.js"></script>
</body>
</html>