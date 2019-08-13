<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['id'])
	{
	
		$faculty_id=$_GET['id'];
		
		$query="delete from faculty where faculty_id='$faculty_id'";
		
		if(mysqli_query($conn, $query)) 
		{
		   header('location:../manage_faculty.php?result1=0');
		}
		else
		{
			header('location:../manage_faculty.php?result=1');
		}		
		mysqli_close($conn);
	}
?>