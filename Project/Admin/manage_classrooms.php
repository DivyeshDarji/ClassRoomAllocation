<?php 
session_start();
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
			<div class="container-fluid">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view">View</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add">Add</a></li>
				</ul>
				<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
					<h3>Classrooms/Lab</h3>
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
							include("../PHP/connect.php");
							
							if(!isset($_SESSION["login_user"]))
							{
								header("location:../index.php");
							}
							
							$query="Select * from classroom";
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
							<table class="table-bordered" cellpadding="12px" id="view_table">
								<tr>
									<th>Floor</th>
									<th>Classroom Number</th>
									<th>Classroom Type</th>
									<th>System Type</th>
									<th>Capacity</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
								?>
								<tr>
									<td><?php echo $rs[$i]['floor'] ?></td>
									<td><?php echo $rs[$i]['classroom_number'] ?></td>
									<td><?php echo $rs[$i]['room_type'] ?></td>
									<td><?php echo $rs[$i]['system'] ?></td>
									<td><?php echo $rs[$i]['capacity'] ?></td>
									<td><button class="btn btn-light"><a href="update_classroom.php?id=<?php echo $rs[$i]['classroom_number'] ?>">Update</a></button></td>
									<td><button class="btn btn-light"><a href="PHP/delete_classroom.php?classroom_no=<?php echo $rs[$i]['classroom_number']; ?> ">Delete</a></button></td>
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
						<h3>Add Classroom:</h3>		  
						<form action="PHP/add_classroom.php" method="post">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="form-group">
										<label for="floor">Select Floor: </label>
										<select class="form-control" id="floor" name="floor" required>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
										</select>
									</div>
									<div class="form-group">
										<label for="classroom_no">Enter Classroom Number: </label>
										<input type="text" class="form-control" name="classroom_no" id="classroom_no" placeholder="Enter Classroom Number" required>
									</div>
									<div class="form-group">
										<label for="classroom_type">Select Classroom Type: </label>
										<select class="form-control" id="classroom_type" name="classroom_type" required>
											<option>Classroom</option>
											<option>Lab</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="classroom_system">Select System Type: </label>
										<select class="form-control" id="classroom_system" name="classroom_system" required>
											<option>White Board</option>
											<option>Smart Board</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="classroom_capacity">Enter Capacity: </label>
										<input type="number" class="form-control" name="classroom_capacity" id="classroom_capacity" placeholder="Enter Capacity" required>
									</div>
								</div>
							</div>
							<div class="float-lg-right">
								<input class="btn btn-outline-secondary" type="submit" value="Add Classroom" name="submit">
							</div>
						</form>
					</div>
				</div><br><br>
			</div>
		</div>
		<?php include('admin_footer.php'); ?>
	</body>
</html>