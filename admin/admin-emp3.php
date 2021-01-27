<?php
session_start();
$id = $_SESSION['user_name'];
$emp_mail = $_SESSION['emp_mail'];
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
            padding-left: 75%;

        }

    </style>

</head>

<body>

    <?php
        if(isset($_POST['delete'])){

            $sql = "DELETE FROM job WHERE employee_emp_email = '$emp_mail' ";
            $isql = $con->query($sql);

            if($isql===true){
                $sql2 = "DELETE FROM employee WHERE emp_email = '$emp_mail' ";
                $isql2 = $con->query($sql2);
            
                if($isql2===true){
                    ?>
                    <script>
                        alert("Deleted");
                    </script>
                    <?php
                    header("location:admin-emp.php");
                }else{
                    ?>
                    <script>
                        alert("Error!!!");
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
                        <a class="dropdown-item" href="admin-profile.php">View Profile</a>
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
                        $sql = "select * from employee where emp_email = '$emp_mail' ";
                        $isql = $con->query($sql);

                        if($isql->num_rows>0){
                            while($row = $isql->fetch_assoc()) {
                            ?><div class="card">
                                    <div class="card-header">
                                        <?php $emp_email = $row["emp_email"]; ?>
                                 
                                        <?php echo "Name: ".$row["emp_name"] ?> <br>
                                    </div>
                                    <div class="card-body">
                                        <?php echo "Email: ".$row["emp_email"] ?> <br> <br>
                                        <a href="admin-emp4.php?var=<?php echo $emp_email;?>" target="blank">View Posted Job</a> <br>
                                        
                                    </div>
                                </div>
                            <?php
                            }
                        }else{
                            echo "No result found";
                        }
                    ?>
                </div>       
                    
                    <br>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="btn btn-group btn-group-lg bt" role="group" aria-label="Basic mixed styles example">
                            
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <!-- <button type="submit" name="edit" class="btn btn-warning"> Edit </button> -->
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <button type="submit" name="delete" class="btn btn-danger"> Ban ID </button>
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