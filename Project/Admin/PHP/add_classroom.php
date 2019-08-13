<?php
	session_start();
	include('../../PHP/connect.php');
	
	if(!isset($_SESSION['login_user']))
	{
		header('location:../../index.php');
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$cr_floor=$_POST['floor'];
		$cr_no=$_POST['classroom_no'];
		$cr_type=$_POST['classroom_type'];
		$cr_system=$_POST['classroom_system'];
		$cr_capacity=(int)$_POST['classroom_capacity'];
			
			if($_POST['submit'])
			{
					$query="insert into classroom(floor, classroom_number, room_type, system, capacity) values ('$cr_floor','$cr_no','$cr_type', '$cr_system','$cr_capacity')";
					if(mysqli_query($conn,$query))
					{
						echo "1 row inserted";
						header('Location:../manage_classrooms.php?result2=0');
					}
					else{
						header('Location:../manage_classrooms.php?result2=1');
}
			}
	}
?>