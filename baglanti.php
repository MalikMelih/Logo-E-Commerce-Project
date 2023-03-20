<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$datatable = "logo";
	
	$conn = mysqli_connect($host,$username,$password,$datatable);
	$con = mysqli_set_charset($conn,"utf8");
?>