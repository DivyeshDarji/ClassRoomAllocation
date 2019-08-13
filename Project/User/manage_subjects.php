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
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="user_home.php"><?php echo $row['course_name'] ?> Sem <?php echo $row['course_sem'] ?> <?php echo $row['course_division'] ?></a></li>
					<li><a href="#">Manage Subjects</a></li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view">View</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add">Add</a></li>
				</ul>
				<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
						<h3>Subjects</h3>
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
								$query="Select * from subjects INNER JOIN faculty ON subjects.s_faculty_id=faculty.faculty_id where s_course_id='".$_SESSION['course']."'";
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
									<th>Subject Name</th>
									<th>Faculty Name</th>
									<th colspan="2">Action</th>
								</tr>
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
										
								?>
								<tr>
									<td><?php echo $rs[$i]['subject_name'] ?></td>
									<td><?php echo $rs[$i]['faculty_name'] ?></td>
									<td><button type="button" class="btn btn-light"><a href="update_subject.php?id=<?php echo $rs[$i]['subject_id'] ?>">Update</a></button></td>
									<td><button type="button" class="btn btn-light"><a href="PHP/delete_subject.php?id=<?php echo $rs[$i]['subject_id'] ?>">Delete</a></button></td>
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
						<h3>Add Subject:</h3>		  
						<form action="PHP/add_subject.php" method="post">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="form-group">
										<label for="subject_name">Enter Subject Name: </label>
										<input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Enter Subject Name" required>
									</div>
									<div class="form-group">
										<label for="faculty_contactnum">Enter Faculty Name: </label>
										<?php
											$sql1="SELECT faculty_name From faculty where faculty_course_id='".$_SESSION['course']."'";
											$query1 = mysqli_query($conn, $sql1);
											//$row = mysqli_num_rows($sql);
									
												echo "<select class='form-control' name='faculty_name'>";
												while ($row1 = mysqli_fetch_array($query1))
												{
													$rs1[]=$row1;
												}
												for($i=1;$i<count($rs1);$i++)
												{
													echo "<option value='". $rs1[$i]['faculty_name'] ."'>" .$rs1[$i]['faculty_name'] ."</option>" ;
												}
												echo "</select>" ;

											?>
									</div>
									
									<input type="hidden" name="course_id" value="<?php echo $course_id ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="float-lg-right">
										<input class="btn btn-outline-secondary" type="submit" value="Add Subject" name="submit">
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

