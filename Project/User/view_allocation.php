<?php 
session_start();
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
			<div class="container-fluid">
				<ul class="breadcrumb">
					<li><a href="user_home.php"><?php echo $row['course_name'] ?> Sem <?php echo $row['course_sem'] ?> <?php echo $row['course_division'] ?></a></li>
					<li><a href="#">View Allocations</a></li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view">View</a></li>
				</ul>
				<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
						<h3>Active Allocations:</h3>
						<?php
							if(isset($_GET['result1']) && $_GET['result1'] == 0){
							echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data Deleted Successfully</div>'; }
							else if(isset($_GET['result1']) && $_GET['result1'] == 1){
							
							echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>Data could not be deleted</div>';
							 }
					?>
						<?php
							include("../PHP/connect.php");
							
							if(!isset($_SESSION["login_user"]))
							{
								header("location:../index.php");
							}
							$query="Select * from classroomallocation INNER JOIN subjects on classroomallocation.allc_subject_id=subjects.subject_id where classroomallocation.allc_validTillDate>=now()";
							$result=mysqli_query($conn,$query);
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
									<th>Day</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Subject Name</th>
									<th>Classroom Number</th>
									<th>Action</th>
								</tr>
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
										
								?>	
								<tr>
									<td><?php echo $rs[$i]['allc_day'] ?></td>
									<td><?php echo $rs[$i]['allc_start_time'] ?></td>
									<td><?php echo $rs[$i]['allc_end_time'] ?></td>
									<td><?php echo $rs[$i]['subject_name'] ?></td>
									<td><?php echo $rs[$i]['allc_classroom_number'] ?></td>
									<td><button type="button" class="btn btn-light"><a href="PHP/delete_allocation.php?id=<?php echo $rs[$i]['allc_id'] ?>">Delete</a></button></td>
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
				</div>
			</div><br><br>
		</div>
		<?php include('user-footer.php'); ?>
	</body>
</html>