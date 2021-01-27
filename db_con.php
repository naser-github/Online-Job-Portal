<?php
   
    $server = "localhost";
    $username = "root";
    $password = "";
    $db="look-for";
    // Create connection
    $con = new mysqli($server, $username, $password, $db);
	// Check connection
	if ($con->connect_error) {
	  die("Connection failed: " . $con->connect_error);
	}
?>