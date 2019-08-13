<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['id'])
	{
	
		$course_id=$_GET['id'];
		
		$query="delete from lecture where lec_course_id='$course_id'";
		
		if(mysqli_query($conn, $query)) 
		{
		   header('location:../manage_timetable.php?result1=0');
		}
		else
		{
			header('location:../manage_timetable.php?result1=1');
		}		
		mysqli_close($conn);
	}
?>