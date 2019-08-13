<?php 
	session_start();
	include("connect.php");
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $login_username = $_POST['login_email'];
    $login_password = $_POST['login_password']; 
	
	$query = "SELECT * FROM course_coordinator WHERE cc_email = '$login_username' and cc_password = '$login_password'";
      $result = mysqli_query($conn,$query)or die(mysqli_error($conn));
     // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //$active = $row['active'];
      
      //$count = mysqli_num_rows($result);
      
      // If result matched $login_username and $login_password, table row must be 1 row
		
      if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION['login_user'] = $row['cc_id'];
			$user=$row['type'];
			$_SESSION['user_type']=$row['type'];
			// If result matched $login_username and $login_password, table row must be 1 row		
			if($user=="Admin")
			{
				header('location: ../Admin/manage_course_coordinators.php');
			}
			else if($user=="Course Co-ordinator")
			{
				//session_register('login_username');
				
				header('location: ../User/user_home.php');
				 
				//echo "Welcome,".$login_username;
				//echo "Your Password".$login_password; 
			}
		}
		else
		{
			header('location: ../index.php?result=1');
		}
	  mysqli_close($conn);
   }


/*
	include("connect.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		// username and password sent from form 
      
		$login_username = $_POST['login_email'];
		$login_password = md5($_POST['login_password']); 
	
		$query="SELECT * FROM users WHERE user_name = '$login_username' and user_password = '$login_password'";
		$result = mysqli_query($conn,$query)or die(mysqli_error($conn));
		// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		//$active = $row['active'];
     
		if(mysqli_num_rows($result)>0)
		{
			
			$row=mysqli_fetch_assoc($result);
			//$_SESSION['login_user'] = $row['user_name'];
			
			//$_SESSION['login_status']= $row['user_id'];
			$user=$_SESSION['login_user'];
			// If result matched $login_username and $login_password, table row must be 1 row		
			if($user=="admin@gmail.com")
			{
				echo "Yesss";
				//header('location: ../User/user_home.php');
				
			}
			else
			{
				//session_register('login_username');
				
				header('location: ../User/user_home.php');
				 
				//echo "Welcome,".$login_username;
				//echo "Your Password".$login_password; 
			}
		}
	}*/
?>