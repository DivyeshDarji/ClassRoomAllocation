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
					<h3>Course Co-ordinators</h3>
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
							
							$query="Select * from course_coordinator where type='Course Co-ordinator'";
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
									<th>Name</th>
									<th>Contact Number</th>
									<th>Email Id</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
								?>
								<tr>
									<td><?php echo $rs[$i]['cc_name'] ?></td>
									<td><?php echo $rs[$i]['cc_contactnum'] ?></td>
									<td><?php echo $rs[$i]['cc_email'] ?></td>
									<!--<td><?php //echo $rs[$i]['cc_password'] ?></td>-->
									<td><button type="button" class="btn btn-light"><a href="update_cc.php?id=<?php echo$rs[$i]['cc_id'] ?>">Update</a></button></td>
									<td><button type="button" class="btn btn-light"><a href="PHP/delete_cc.php?email=<?php echo $rs[$i]['cc_email']; ?> ">Delete</a></button></td>
								</tr>
								
								<?php 
									}
								?>
							</table>
						</div>
						<?php
							}
						?>
					</div>	<!--view tab close-->
					<div id="add" class="container tab-pane">
						<br>
						<h3>Add Course Co-ordinator:</h3>		  
						<form action="PHP/add_cc.php" method="post">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="form-group">
										<label for="cc_name">Enter Co-ordinator Name: </label>
										<input type="text" class="form-control" name="cc_name" id="cc_name" placeholder="Enter Name" required>
									</div>
									<div class="form-group">
										<label for="cc_contactnum">Enter Contact Number: </label>
										<input type="tel" pattern="^\d{10}$" class="form-control" id="cc_contactnum" name="cc_contactnum" placeholder="Enter Contact Number" required>
									</div>
									<div class="form-group">
										<label for="cc_email">Enter Email Id: </label>
										<input type="email" class="form-control" id="cc_email" name="cc_email" placeholder="Enter Email Id" required>
									</div>
									<div class="form-group">
										<label for="cc_password">Enter Password: </label>
										<input type="password" class="form-control" name="cc_password" id="cc_password" placeholder="Enter Password" required>
									</div>
									
								</div>
							</div>
							<div class="float-lg-right">
								<input class="btn btn-outline-secondary" type="submit" value="Add Course Co-ordinator" name="submit">
							</div>
						</form>
					</div>
				</div><br><br>
			</div>
		</div>
		<?php include('admin_footer.php'); ?>
	</body>
</html>