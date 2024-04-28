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
		$fac_id = $_POST["id"];
		$fac_name = $_POST["name"];
		$fac_doj = $_POST["doj"];
		$qualification = $_POST["qualification"];
		$department = $_POST["department"];
		$sql = "INSERT INTO faculty_tab (fac_id, fac_name, fac_DOJ, qualification, department) VALUES ($fac_id, '$fac_name', '$fac_doj', '$qualification', '$department')";
		$connect->query($sql);
		header("Location: index.php");
	}
?>	