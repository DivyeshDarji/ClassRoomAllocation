<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['name'] && $_GET['semester'] && $_GET['division'])
	{
	
		$course_name=$_GET['name'];
		$semester_no=$_GET['semester'];
		$division=$_GET['division'];
		
		$query="delete from course where course_name='".$_GET['name']."' AND course_sem='".$_GET['semester']."' AND course_division='".$_GET['division']."'";
		
		if(mysqli_query($conn, $query)) 
		{
		   header('location:../manage_courses.php?result1=0');
		}
		else
		{
			header('location:../manage_courses.php?result1=1');
		}		
		mysqli_close($conn);
	}
		
		
	
	
?>