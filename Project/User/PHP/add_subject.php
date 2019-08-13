<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$subject_name=$_POST['subject_name'];
		$faculty_name=$_POST['faculty_name'];
		$course_id=$_SESSION['course'];	
			if($_POST['submit'])
			{
				$query="select faculty_id from faculty where faculty_name='$faculty_name'";
				$result=mysqli_query($conn, $query);
				$row=mysqli_fetch_array($result);
				$faculty_id=$row['faculty_id'];
				
				$query1="insert into subjects(subject_name, s_course_id, s_faculty_id) values ('$subject_name','$course_id', '$faculty_id')";
				
				if(mysqli_query($conn,$query))
				{
					header('location: ../manage_subjects.php?result2=0');
				}
				else
				{
					header('location: ../manage_subjects.php?result2=1');
				}
			}
	}
?>