<?php 
session_start();
if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$course_id=$_POST['course_id'];
		$_SESSION['course']= $course_id;
	}
	include('../PHP/connect.php');
	$query="select * from course where course_id='".$_SESSION['course']."'";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	
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
				  <li><a href="user_home.php"><?php echo $row['course_name'] ?> Sem <?php echo $row['course_sem'] ?> <?php echo $row['course_division'] ?></a></li>
				  <li><a href="#">Manage Faculty</a></li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view">View</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add">Add</a></li>
				</ul>
				<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
						<h3>Faculty</h3>
						<?php
							if(isset($_GET['result']) && $_GET['result'] == 0){
							echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data Updated Successfully</div>'; }
							else if(isset($_GET['result']) && $_GET['result'] == 1){
							
							echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data could not be updated</div>';
							 } 
							 
							 if(isset($_GET['result2']) && $_GET['result2'] == 0){
							echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data Inserted Successfully</div>'; }
							else if(isset($_GET['result2']) && $_GET['result2'] == 1){
							
							echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data could not be inserted</div>';
							 } 
							 
							 if(isset($_GET['result1']) && $_GET['result1'] == 0){
							echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data Deleted Successfully</div>'; }
							else if(isset($_GET['result1']) && $_GET['result1'] == 1){
							
							echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data could not be deleted</div>';
							 }
					?>
						<?php
							
							
							if(!isset($_SESSION["login_user"]))
							{
								header("location:../index.php");
							}
								
								$query="Select * from faculty where faculty_course_id='".$_SESSION['course']."'";
								$result=mysqli_query($conn, $query);
							
								//$row=mysqli_fetch_array($result);
								$count=mysqli_num_rows($result);
								if($count==0)
								{
						?>
						<p>No records to display</p>
						<?php
								}
								else
								{
									while($row = mysqli_fetch_array($result))
									{
										$rs[]=$row;
									}
						?>
						<div class="table-responsive">
							<table class="table-bordered text-center" cellpadding="8px" id="view_table">
								<tr>
									<th>Faculty Name</th>
									<th>Contact No.</th>
									<th>Email Id</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
								?>
								<tr>
									<td><?php echo $rs[$i]['faculty_name'] ?></td>
									<td><?php echo $rs[$i]['faculty_contactnum'] ?></td>
									<td><?php echo $rs[$i]['faculty_email'] ?></td>
									<td><button type="button" class="btn btn-light"><a href="update_faculty.php?id=<?php echo $rs[$i]['faculty_id'] ?>">Update</a></button></td>
									<td><button type="button" class="btn btn-light"><a href="PHP/delete_faculty.php?id=<?php echo $rs[$i]['faculty_id'] ?>">Delete</a></button></td>
								</tr>
								<?php 
									}
								?>
							</table>
						</div>
						<?php 
								
							}
						?>
					</div>
					
					<div id="add" class="container tab-pane">
						<br>
						<h3>Add Faculty:</h3>		  
						<form action="PHP/add_faculty.php" method="post">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="form-group">
										<label for="faculty_name">Enter Faculty Name: </label>
										<input type="text" class="form-control" name="faculty_name" id="faculty_name" placeholder="Enter Faculty Name" required>
									</div>
									<div class="form-group">
										<label for="faculty_contactnum">Enter Contact Number: </label>
										<input type="tel" pattern="^\d{10}$" class="form-control" name="faculty_contactnum" id="faculty_contactnum" placeholder="Enter Contact Number" required>
									</div>
									<div class="form-group">
										<label for="faculty_email">Enter Email Id: </label>
										<input type="email" class="form-control" name="faculty_email" id="faculty_email" placeholder="Enter Email Id:" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="float-lg-right">
										<input class="btn btn-outline-secondary" type="submit" value="Add Faculty" name="submit">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div><br><br>
			</div>
		</div>
		
		<?php include('user-footer.php'); ?>
	</body>
</html>

