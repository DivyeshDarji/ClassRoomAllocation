<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$course_name=$_POST['course_name'];
			$semester_no=$_POST['semester_no'];
			$division=$_POST['division'];
			$course_cr_name=$_POST['course_cr_name'];
			$course_cr_num=$_POST['course_cr_num'];
			$course_cr_email=$_POST['course_cr_email'];
			$course_sr_name=$_POST['course_sr_name'];
			$course_sr_num=$_POST['course_sr_num'];
			$course_sr_email=$_POST['course_sr_email'];
			$cc_name=$_POST['cc_name'];
			
			$query1=mysqli_query($conn,"select cc_id from course_coordinator where cc_name='$cc_name'");
			$row=mysqli_fetch_array($query1);
			$cc_id=$row['cc_id'];
			
			if($_POST['submit'])
			{
				$query="insert into course(course_name, course_sem, course_division, course_cr_name, course_cr_contactnum, course_cr_email, course_sr_name, course_sr_contactnum, course_sr_email, course_cc_id) values ('$course_name','$semester_no','$division','$course_cr_name','$course_cr_num','$course_cr_email', '$course_sr_name','$course_sr_num','$course_sr_email', '$cc_id')";
				if(mysqli_query($conn,$query))
				{
					header('location: ../manage_courses.php?result2=0');
				}
				else
				{
					header('location: ../manage_courses.php?result2=1');
				}

			}
	}
?>