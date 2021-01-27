<!DOCTYPE html>
<html>

<head>
	<title> Online Resume </title>

    <link rel="stylesheet" href="../css/cv_1.css">
</head>

<body>

    <!-- <?php
        if(isset($_POST['Submit1']))
        { 
        $filepath = "cv-images/" . $_FILES["file"]["name"];

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
        {
        echo "<img src=".$filepath." height=200 width=300 />";
        } 
        else 
        {
        echo "Error !!";
        }
        } 
    ?> -->

	<form>
		<div id="header" >
			<p>
                <!-- <div style="padding-left:70%;" >
                    <form action="make-cv.php" enctype="multipart/form-data" method="post">
                        Select image :
                        <input type="file" name="file" ><br/>
                        <input type="submit" value="Upload" name="Submit1"> <br/> &nbsp;
                    </form>
                </div> -->
                
                Name: &nbsp &nbsp <input type="text" name="name_h" placeholder="input your name" required> <br><br>
				Address: <input type="text" name="address_h" placeholder="input your address" required> <br><br>
				Email: &nbsp &nbsp<input type="text" name="email_h" placeholder="input your email" required>
				
			</p>
		</div>
		<br>

		<div>
			<h4>Profile</h4>
			<p> <textarea placeholder="About yourself"></textarea required> </p>
		</div>

		<div>
			<h4>Employment History</h4>
			<p>
				Designation: &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="post" required> <br> <br>
				Company Name:  &nbsp  &nbsp <input type="text" name="name_cmp" required> <br> <br>
				Company Address:&nbsp <input type="text" name="add_cmp" required> <br> <br>
			</p>
		</div>

		<div>
			<h4>Educational </h4>
			<table border="1">
				<tr>
					<th>Degree</th>
					<th>Institute</th>
					<th>Grade</th>
					<th>year</th>
				</tr>

				<tr>
					<td><input type="text" name="degree" placeholder="Degree" required></td>
					<td><input type="text" name="institute" placeholder="Institute name" required></td>
					<td><input type="text" name="cgpa" placeholder="Cgpa" required></td>
					<td><input type="text" name="status" placeholder="Status" required></td>
				</tr>
				
			</table>

		<div>
			<h4>Skills</h4>
			<table border="1">
				<tr>
					<th>Title</th>
					<th>Level</th>
				</tr>

				<tr>
					<td> <input type="skill_1" name="skill_1" required> </td>
					<td> <input type="level_1" name="level_1" required> </td>
				</tr>

				<tr>
					<td> <input type="skill_2" name="skill_2"> </td>
					<td> <input type="level_2" name="level_2"> </td>
				</tr>

				<tr>
					<td> <input type="skill_3" name="skill_3"> </td>
					<td> <input type="level_3" name="level_3"> </td>
				</tr>
				
			</table>
		</div>

		<div>
			<h4> Language </h4>
			<p>
				<input type="text" name="language_1">
				<br>
				<input type="text" name="language_2">
			</p>
		</div>

		<div >
			<h4> Reference </h4>
			<table>
				<tr>
					<th>Reference 1</th> 
				</tr>
				<tr>
					<td colspan="1"></td>
					<th> Name </th>
					<td><input type="text" name="ref_name_1" required></td>
				</tr>
				<tr> 
					<td colspan="1"></td>
					<th> Designation </th>
					<td> <input type="text" name="ref_des_1" required></td> 
				</tr>
				<tr>
					<td colspan="1"></td>
					<th> Address </th>
					<td> <input type="text" name="ref_add_1" required></td></td>
				</tr>

				<tr>
					<th>Reference 2</th> 
				</tr>
				<tr>
					<td colspan="1"></td>
					<th> Name </th>
					<td><input type="text" name="ref_name_2"></td>
				</tr>
				<tr> 
					<td colspan="1"></td>
					<th> Designation </th>
					<td> <input type="text" name="ref_des_2"></td> 
				</tr>
				<tr>
					<td colspan="1"></td>
					<th> Address </th>
					<td> <input type="text" name="ref_add_2"></td></td>
				</tr>

			</table>
		</div>

		<br>
		<!-- <p style="text-align: right;">
			<input type="submit" style="font-size: 20px;" >
			<input type="reset" style="font-size: 20px;">
		</p> -->
	</form>

</body>
</html>