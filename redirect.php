<?php

	include ("db_connection.php");

	session_start();
	
	$_SESSION['id']=$_POST['uid'];
	$_SESSION['pwd']=$_POST['pwd'];
	$_SESSION['role'];
	
	$i = 0;
	$verify = false;
	$sql_product="SELECT * FROM users_tab";
	$result_product=$connect->query($sql_product);
	while($row_product = $result_product->fetch_assoc())
	{
		if ($row_product["userid"] == $_SESSION['id'] && $row_product["password"] == $_SESSION['pwd'])
		{
			$verify = true;
			$_SESSION['role'] = $row_product["role"];
			if ($_SESSION['role'] == "Student")
			{
				header("Location: student/index.php");
			}
			
			if ($_SESSION['role'] == "Faculty")
			{
				header("Location: faculty/index.php");
			}
			
			if ($_SESSION['role'] == "Admin")
			{
				header("Location: admin/index.php");
			}
		}
	}
	echo "Error, invalid credentials";
	if (!$verify)
	{
		header("Location: login.php");
	}
?>