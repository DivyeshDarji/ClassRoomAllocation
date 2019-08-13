<?php 
	session_start();
	include('../PHP/connect.php');
	$query2="select * from course where course_id='".$_SESSION['course']."'";
	$result2=mysqli_query($conn,$query2);
	$row2=mysqli_fetch_array($result2);
	if(isset($_GET['id']))
	{
		$faculty_id=$_GET['id'];
		$query="Select * from faculty where faculty_id='$faculty_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
	}

	if(isset($_POST['submit']))
	{
		$faculty_name=$_POST['faculty_name'];
		$faculty_contactnum=$_POST['faculty_contactnum'];
		$faculty_email=$_POST['faculty_email'];
		$course_id=$_SESSION['course'];	
		
		$query="update faculty set faculty_name='$faculty_name', faculty_contactnum='$faculty_contactnum', faculty_email='$faculty_email' where faculty_id='$faculty_id'";
		if(mysqli_query($conn,$query))
		{
			header('location:manage_faculty.php?result=0');
		}
		else
		{
			header('location:manage_faculty.php?result=1');
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="CSS/user_css.css">
	</head>
	<body>
		<!--Top and Side Navbar Begins-->
		<?php include('user_header.php'); ?>
		<?php include('user_side_navbar.php') ?>
		<!--Top and Side Navbar Ends-->
		
		<div id="page-wrapper">
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="user_home.php"><?php echo $row2['course_name'] ?> Sem <?php echo $row2['course_sem'] ?> <?php echo $row2['course_division'] ?></a></li>
					<li><a href="#">Update Faculty</a></li>
				</ul>
				<h3>Update faculty:</h3>		  
				<form method="post">
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="form-group">
								<label for="faculty_name">Enter Faculty Name: </label>
								<input type="text" class="form-control" name="faculty_name" id="faculty_name" value="<?php echo $row['faculty_name'] ?>" required>
							</div>
							<div class="form-group">
								<label for="faculty_contactnum">Enter Contact Number: </label>
								<input type="tel" pattern="^\d{10}$" class="form-control" name="faculty_contactnum" id="faculty_contactnum" value="<?php echo $row['faculty_contactnum'] ?>" required>
							</div>
							<div class="form-group">
								<label for="faculty_email">Enter Email Id: </label>
								<input type="email" class="form-control" name="faculty_email" id="faculty_email" value="<?php echo $row['faculty_email'] ?>" required>
							</div>
						</div>
					</div>
					<div class="float-lg-right">
						<input class="btn btn-outline-secondary" type="submit" value="Update Faculty" name="submit">
					</div>
				</form>
			</div>
		</div><br><br>
		<?php include('user-footer.php'); ?>
	</body>
</html>