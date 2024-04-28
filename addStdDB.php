<?php
	include ("../db_connection.php");
	session_start();
	
	if(($_SESSION['role'] !="Admin"))
	{
		echo "You are trying to access a BAD Page. <a href='../login.php' >Login Again</a> ";
		session_destroy();
	}
	
	else
	{
		$stu_id = $_POST["id"];
		$stu_name = $_POST["name"];
		$stu_year_of_enrollment = $_POST["enrollyear"];
		$stu_major = $_POST["major"];
		$CGPA = $_POST["CGPA"];
		$year_of_graduation = $_POST["graduateyear"];
		$sql = "INSERT INTO student_tab (stu_id, stu_name, stu_year_of_enrollment, stu_major, CGPA, year_of_graduation) VALUES ($stu_id, '$stu_name', $stu_year_of_enrollment, '$stu_major', '$CGPA', $year_of_graduation)";
		$connect->query($sql);
		header("Location: index.php");
	}
?>