<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$course_id=$_POST['course_id'];
		$_SESSION['course']= $course_id;
		
	}
	$course_id=$_SESSION['course'];
	
?>