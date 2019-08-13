<?php 
	session_start();
	include('../PHP/connect.php');
	if(isset($_GET['id']))
	{
		$cc_id=$_GET['id'];
		$query="Select * from course_coordinator where cc_id='$cc_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
	}

	if(isset($_POST['submit']))
	{
		$cc_name=$_POST['cc_name'];
		$cc_contactnum=$_POST['cc_contactnum'];
		$cc_email=$_POST['cc_email'];
		$cc_password=$_POST['cc_password'];
		
		$query="update course_coordinator set cc_name='$cc_name', cc_contactnum='$cc_contactnum', cc_email='$cc_email', cc_password='$cc_password' where cc_id='$cc_id'";
		if(mysqli_query($conn,$query))
		{
			header('location:manage_course_coordinators.php?result=0');
		}
		else
		{
			header('location:manage_course_coordinators.php?result=1');
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="CSS/admin_css.css">
	</head>
	<body>
		<!--Top and Side Navbar Begins-->
		<?php include('admin_header.php'); ?>
		<?php include('admin_side_navbar.php') ?>
		<!--Top and Side Navbar Ends-->
		
		<div id="page-wrapper">
			<div class="container">
				<h3>Update Course Co-ordinator:</h3>		  
				<form method="post">
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="form-group">
								<label for="cc_name">Enter Co-ordinator Name: </label>
								<input type="text" class="form-control" name="cc_name" id="cc_name" value="<?php echo $row['cc_name']; ?>" required>
							</div>
							<div class="form-group">
								<label for="cc_contactnum">Enter Contact Number: </label>
								<input type="tel" pattern="^\d{10}$" class="form-control" id="cc_contactnum" name="cc_contactnum" value="<?php echo $row['cc_contactnum']; ?>" required>
							</div>
							<div class="form-group">
								<label for="cc_email">Enter Email Id: </label>
								<input type="email" class="form-control" id="cc_email" name="cc_email" value="<?php echo $row['cc_email']; ?>" required>
							</div>
							<div class="form-group">
								<label for="cc_password">Enter Password: </label>
								<input type="password" class="form-control" name="cc_password" id="cc_password" value="<?php echo $row['cc_password']; ?>" required>
							</div>
						</div>
					</div>
					<div class="float-lg-right">
						<input class="btn btn-outline-secondary" type="submit" value="Update Course Co-ordinator" name="submit">
					</div>
				</form>
			</div><br><br>
		</div>
		<?php include('admin_footer.php'); ?>
	</body>
</html>