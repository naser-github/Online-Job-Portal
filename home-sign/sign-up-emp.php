<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="../design/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/home-sign.css">

    <style>
        .sign-up-box{
            width: 400px;
            height: 500px; 
    }

    </style>

</head>
<body>

<?php
include '../db_con.php'; 
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con,$_POST['r_emp_name']);
        $email = mysqli_real_escape_string($con,$_POST['r_emp_email']);
        $pass = mysqli_real_escape_string($con,$_POST['r_emp_pass']);
        $cpass = mysqli_real_escape_string($con,$_POST['r_emp_cpass']);

        $check_email = "select * from employee where emp_email = '$email' ";
        $query = $con->query($check_email);
        
        if ($query->num_rows>0){
            ?>
            <script>
                alert("email already exist try another one");
            </script>
            <?php
        }else{
            if($pass === $cpass){
                $insert_query = "insert into employee (emp_email, emp_name, emp_pass)
                values ('$email','$name','$pass')";
                
                $iquery = $con->query($insert_query);

                if($iquery){
                    ?>
                    <script>
                        alert("Signed up successfully.");
                    </script>
                    <?php
                    header("location:sign-in-emp-su.php");
                }else{
                    ?>
                    <script>
                        alert("Error");
                    </script>
                    <?php
                }
            }else{
                ?>
                <script>
                    alert("Confirm your Password");
                </script>
                <?php
            }
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
        <li class="breadcrumb-item"> <a class="bcumb" href="../home.php">Home</a></li>
        <li class="breadcrumb-item active">Sign Up</li>
    </ol>
    
    <!-- sign-box -->
    <div class="sign-box sign-up-box">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <br><br>
            Name <br>
            <input class="form-control mr-sm-2" name="r_emp_name" type="text" placeholder="Full Name"  required> <br>
            Email <br>
            <input class="form-control mr-sm-2" name="r_emp_email" type="email" placeholder="Eamil" required> <br>
            Password <br>
            <input class="form-control mr-sm-2" name="r_emp_pass" type="password" placeholder="Password" required> <br>
            Confirm Password <br>
            <input class="form-control mr-sm-2" name="r_emp_cpass" type="password" placeholder="Confirm Password" required> <br>
            <button class="btn btn-outline-white" type="submit" name="submit" ">Sign Up</button> <br><br>
        </form>
    </div>
    
    <br> <br> <br> <br> <br> <br>

 <script src="../design/jquery-3.5.1.slim.min.js"></script>
 <script src="../design/popper.min.js"></script>
 <script src="../design/bootstrap.min.js"></script>
</body>
</html>