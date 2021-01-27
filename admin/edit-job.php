<?php
session_start();
$id = $_SESSION['user_name'];
$j_id = $_SESSION['job_id'];

include "../db_con.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>lOOk-for.com</title>

    <link rel="stylesheet" href="../design/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/home-sign.css">

    <style>
    .job-box {
        color:rgb(233, 240, 236);
        background:  rgb(20, 70, 70);
        top:10px;
        width: 60%;
        height: auto;
        position: relative;
        font-size: 18px;
        padding-left: 5%;
        padding-right: 5%;
        padding-top: 5%;
        }

    .log{
        font-family:Arial, Helvetica, sans-serif ;
        font-size: 16px;
        font-weight:bold;
    }

    </style>

</head>

<body>

    <?php
        $show = "select * from job where job_id= '$j_id' ";
        $shows = $con->query($show);

        if ($shows->num_rows > 0) {
            while($val = $shows->fetch_assoc()) {
                $val_title = $val["job_title"];
                $val_desc = $val["job_description"];
                $val_req = $val["job_requirement"];
                $val_dline = $val["job_deadline"];
                $val_cat = $val["catagory"];
                $val_state = $val["state"];
                $val_name = $val["cmp_name"];
                $val_type = $val["cmp_type"];
                $val_loc = $val["job_location"];
                $val_salary = $val["salary"];
                $val_vacancy = $val["vacancy"];
            }
        }

        if(isset($_POST['submit'])){
            $j_title = mysqli_real_escape_string($con,$_POST['j-title']);
            $j_desc = mysqli_real_escape_string($con,$_POST['j-desc']);
            $j_req = mysqli_real_escape_string($con,$_POST['j-req']);
            $j_dline = mysqli_real_escape_string($con,$_POST['j-dline']);
            $j_ctg = mysqli_real_escape_string($con,$_POST['j-ctg']);
            $j_loc = mysqli_real_escape_string($con,$_POST['j-loc']);
            $j_cmp = mysqli_real_escape_string($con,$_POST['j-cmp']);
            $j_org = mysqli_real_escape_string($con,$_POST['j-org']);
            $j_add = mysqli_real_escape_string($con,$_POST['j-add']);
            $j_sal = mysqli_real_escape_string($con,$_POST['j-sal']);
            $j_vac = mysqli_real_escape_string($con,$_POST['j-vac']);



            $sql = "UPDATE job SET job_title='$j_title',job_description='$j_desc',job_requirement='$j_req',
                    job_deadline='$j_dline',catagory='$j_ctg',state='$j_loc',cmp_name='$j_cmp',
                    cmp_type='$j_org',job_location='$j_add',salary='$j_sal',vacancy='$j_vac'
                    WHERE job_id= '$j_id' ";

            $isql = $con->query($sql);

            if($isql===TRUE){
                ?>
                <script>
                    alert("Edited Successfully");
                </script>
                <?php
                header("location:admin-jobview.php");
            }else{
                ?>
                <script>
                    alert("Error while editing");
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

    <div class="job-box container">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <h4>Job Title</h4> <br>
            <input class="form-control mr-sm-2" name="j-title" type="text" placeholder="Job Title"
                value="<?php echo $val_title;?>" required> <br>

            <h4> Description</h4> <br>
            <textarea class="form-control mr-sm-2" name="j-desc" rows="8" cols="100" required
                placeholder="Job Description"> <?php echo $val_desc;?> </textarea><br>

            <h4>Job Requirement</h4> <br>
            <textarea class="form-control mr-sm-2" name="j-req" rows="8" cols="100" required
                placeholder="Job Requirement"> <?php echo $val_req;?> </textarea><br>

            <h4>Job Deadline</h4> <br>
            <input class="form-control mr-sm-2" name="j-dline" type="date"
                value="<?php echo $val_dline;?>" required> <br>

            <h4>Job Category</h4> <br>
            <select name="j-ctg" value="<?php echo $val_cat;?>" required>
                <option disabled selected>-- Select Category --</option>
                <option value="Accounting">Accounting</option>
                <option value="Commercial">Commercial</option>
                <option value="Electrician">Electrician</option>
          	  	<option value="Medical">Medical</option>
          	  	<option value="IT">IT</option>
            </select> <br><br>

            <h4>State</h4> <br>
            <select name="j-loc" required>
                <option disabled selected>-- Select City --</option>
                <option value="Barisal">Barisal</option>
                <option value="Chittagong">Chittagong</option>
          	  	<option value="Dhaka">Dhaka</option>
          	  	<option value="Khulna">Khulna</option>
          	  	<option value="Rajshahi">Rajshahi</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Shylet">Shylet</option>
            </select> <br><br>

            <h4>Company Name</h4> <br>
            <input class="form-control mr-sm-2" name="j-cmp" type="text" placeholder="Company Name"
                value="<?php echo $val_name;?>" required> <br>

            <h4>Company Type</h4> <br>
            <select name="j-org" required> value="<?php echo $val_type;?>"
                <option disabled selected>-- Select Type --</option>
                <option value="Govt">Govt</option>
                <option value="NGO">NGO</option>
          	  	<option value="Private">Private</option>
            </select> <br><br>


            <h4>Company Address</h4> <br>
            <input class="form-control mr-sm-2" name="j-add" type="text" placeholder="Company Address"
                value="<?php echo $val_loc;?>" required> <br>

            <h4>Salary</h4> <br>
            <input class="form-control mr-sm-2" name="j-sal" type="text" placeholder="Salary"
                value="<?php echo $val_salary;?>" required> <br>

            <h4>Vacancy</h4> <br>
            <input class="form-control mr-sm-2" name="j-vac" type="text" placeholder="Total Vacancy"
                value="<?php echo $val_vacancy;?>" required> <br>

            <button class="btn btn-outline-white" type="submit" name="submit" ">Edited</button> <br><br>
        </form>
    </div>

  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>
</body>
</html>