<?php
session_start();
$id = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>lOOk-for.com</title>
  <link rel="stylesheet" href="../design/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="../css/home.css"> -->
    
<style>
    .bb{
        left: 70%;
    }
    .mar{
        margin-left: 3%;
    }
</style>

</head>
<body>

    <?php
    if(isset($_POST['edit'])){
        $j_uid = $_POST['j_uid'];

        $_SESSION['j_id'] = $j_uid;
        
        header("location:manage-job-up2.php");
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

    <table border="2" class='table table-striped mar'>
        <tr>
            <th colspan='2'> SL No </th>
            <th colspan='2'> Job Title </th>
            <th colspan='5'> Job Description </th>
            <th colspan='5'> Job Requirement </th>
            <th colspan='2'> Job Deadline  </th>
            <th colspan='2'> Category </th>
            <th colspan='2'> State</th>
            <th colspan='2'> Cmp Name </th>
            <th colspan='2'> Cmp Type </th>
            <th colspan='5'> Job Location </th>
            <th colspan='2'> Salary </th>
            <th colspan='2'> Vacancy </th>
        </tr>

    <?php
    include '../db_con.php';

        $sql = "select * from job where employee_emp_email='$id'";
        $isql = $con->query ($sql);

        if ($isql->num_rows > 0) {
            // output data of each row
            while($row = $isql->fetch_assoc()) {
                echo " 
                    <tr>
                        <td colspan='2'> {$row["job_id"]} </td>
                        <td colspan='2'> {$row["job_title"]} </td>
                        <td colspan='5'> {$row["job_description"]}</td>
                        <td colspan='5'> {$row["job_requirement"]}</td>
                        <td colspan='2'> {$row["job_deadline"]} </td>
                        <td colspan='2'> {$row["catagory"]} </td>
                        <td colspan='2'> {$row["state"]} </td>
                        <td colspan='2'> {$row["cmp_name"]} </td>
                        <td colspan='2'> {$row["cmp_type"]} </td>
                        <td colspan='5'> {$row["job_location"]} </td>
                        <td colspan='2'> {$row["salary"]} </td>
                        <td colspan='2'> {$row["vacancy"]} </td>
                    </tr>
                ";
            }
        } else {
            echo "No jobs added";
        }
    ?>
    </table>

    <br><br>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="btn-group bb" role="group" aria-label="Basic mixed styles example">
            <input type="text" name="j_uid" placeholder="Input Job Id" required>
            <button type="submit" name="edit" class="btn btn-warning">Edit a post</button>
        </div>
    </form>


  <script src="../design/jquery-3.5.1.slim.min.js"></script>
  <script src="../design/popper.min.js"></script>
  <script src="../design/bootstrap.min.js"></script>

</body>
</html>
