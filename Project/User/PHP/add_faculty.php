<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$faculty_name=$_POST['faculty_name'];
		$faculty_contactnum=$_POST['faculty_contactnum'];
		$faculty_email=$_POST['faculty_email'];
		$course_id=$_SESSION['course'];	
			if($_POST['submit'])
			{
				$query="insert into faculty(faculty_name, faculty_contactnum, faculty_email, faculty_course_id) values ('$faculty_name','$faculty_contactnum','$faculty_email', '$course_id')";
				
				if(mysqli_query($conn,$query))
				{
					header('location: ../manage_faculty.php?result2=0');
				}
				else
				{
					header('location: ../manage_faculty.php?result2=1');
				}
			}
	}
?>