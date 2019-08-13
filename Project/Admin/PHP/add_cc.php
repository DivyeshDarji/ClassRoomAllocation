<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$cc_name=$_POST['cc_name'];
		$cc_contactnum=$_POST['cc_contactnum'];
		$cc_email=$_POST['cc_email'];
		$cc_password=$_POST['cc_password'];
			
			if($_POST['submit'])
			{
				$query="insert into course_coordinator(cc_name, cc_contactnum, cc_email, cc_password, type) values ('$cc_name','$cc_contactnum','$cc_email', '$cc_password','Course Co-ordinator')";
				//$query1="insert into users(user_name, user_password) values('$cc_email', '$cc_password')";
				
				if(mysqli_query($conn,$query))
				{
					header('location: ../manage_course_coordinators.php?result2=0');
				}
				else
				{
					header('location: ../manage_course_coordinators.php?result2=1');
				}
			}
	}
?>