<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['classroom_no'])
	{
		
		$query="delete from classroom where classroom_number='".$_GET['classroom_no']."'";
		
		if(mysqli_query($conn, $query)) {
				   header('location:../manage_classrooms.php?result1=0');
				}
				else
				{
					header('location:../manage_classrooms.php?result1=1');
				}
				mysqli_close($conn);
	}
		
		
	
	
?>