<?php
	$connect = new mysqli("localhost", "root", "", "emb_db");
	
		if($connect->connect_errno )
		{
			die('Could not connect: ' . $connect->connect_errno);
		}
		
?>s