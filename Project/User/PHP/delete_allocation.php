<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_GET['id'])
	{
	
		$allc_id=$_GET['id'];
		
		$query="delete from classroomallocation where allc_id='$allc_id'";
		
		if(mysqli_query($conn, $query)) 
		{
		   header('location:../view_allocation.php?result1=0');
		}
		else
		{
			header('location:../view_allocation.php?result1=1');
		}		
		mysqli_close($conn);
	}
?>