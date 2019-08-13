<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['email'])
	{
	
		$cc_email=$_GET['email'];
		
		$query="delete from course_coordinator where cc_email='".$_GET['email']."'";
		
		if(mysqli_query($conn, $query)) 
		{
		   header('location:../manage_course_coordinators.php?result1=0');
		}
		else
		{
			header('location:../manage_course_coordinators.php?result1=1');
		}		
		mysqli_close($conn);
	}
?>