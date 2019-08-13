<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['id'])
	{
	
		$subject_id=$_GET['id'];
		
		$query="delete from subjects where subject_id='$subject_id'";
		
		if(mysqli_query($conn, $query)) 
		{
		   header('location:../manage_subjects.php?result1=0');
		}
		else
		{
			header('location:../manage_subjects.php?result1=1');
		}		
		mysqli_close($conn);
	}
?>