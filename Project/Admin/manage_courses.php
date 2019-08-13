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
						<h3>Courses</h3>
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
							
							$query="Select * from course INNER JOIN course_coordinator ON course.course_cc_id=course_coordinator.cc_id";
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
							<table class="table-bordered" cellpadding="8px" id="view_table">
								<tr>
									<th>Course Name</th>
									<th>Semester</th>
									<th>Division</th>
									<th>CR Details</th>
									<th>SR Details</th>
									<th>Co-ordinator</th>
									<th colspan="2">Action</th>
								</tr>
								<!--<tr>
									<th>Name</th>
									<!--<th>Contact Number</th>
									<th>Email Id</th>
									<th>Name</th>
									<!--<th>Contact Number</th>
									<th>Email Id</th>
								</tr>-->
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
								?>
								<tr>
									<td><?php echo $rs[$i]['course_name'] ?></td>
									<td><?php echo $rs[$i]['course_sem'] ?></td>
									<td><?php echo $rs[$i]['course_division'] ?></td>
									<td><?php echo $rs[$i]['course_cr_name'] ?><br><?php echo $rs[$i]['course_cr_contactnum'] ?><br><?php echo $rs[$i]['course_cr_email'] ?></td>
									<!--<td><?php //echo $rs[$i]['course_cr_contactnum'] ?></td>-->
									<!--<td><?php //echo $rs[$i]['course_cr_email'] ?></td>-->
									<td><?php echo $rs[$i]['course_sr_name'] ?><br><?php echo $rs[$i]['course_sr_contactnum'] ?><br><?php echo $rs[$i]['course_sr_email'] ?></td>
									<!--<td><?php //echo $rs[$i]['course_sr_contactnum'] ?></td>-->
									<!--<td><?php //echo $rs[$i]['course_sr_email'] ?></td>-->
									<td><?php echo $rs[$i]['cc_name'] ?></td>
									<td><button type="button" class="btn btn-light"><a href="update_course.php?id=<?php echo $rs[$i]['course_id'] ?>">Update</a></button></td>
									<td><button type="button" class="btn btn-light"><a href="PHP/delete_course.php?name=<?php echo $rs[$i]['course_name']; ?>&semester=<?php echo $rs[$i]['course_sem']; ?>&division=<?php echo $rs[$i]['course_division'] ?>">Delete</a></button></td>
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
						<h3>Add Course:</h3>		  
						<form action="PHP/add_a_course.php" method="post">
							<div class="row">
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label for="Course_name">Enter Course Name: </label>
										<input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course Name" required>
									</div>
									<div class="form-group">
										<label for="Semester">Select Semester: </label>
										<select class="form-control" id="semester_no" name="semester_no" required>
											<option>I</option>
											<option>II</option>
											<option>III</option>
											<option>IV</option>
											<option>V</option>
											<option>VI</option>
											<option>VII</option>
											<option>VIII</option>
										</select>
									</div>
									<div class="form-group">
										<label for="Course_name">Select Division: </label>
										<select class="form-control" id="division" name="division" required>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											<option>E</option>
											<option>F</option>
										</select>
									</div>
									<div class="form-group">
										<label for="course_cr_name">Enter CR Name: </label>
										<input type="text" class="form-control" name="course_cr_name" id="course_cr_name" placeholder="Enter CR Name" required>
									</div>
									<div class="form-group">
										<label for="course_cr_num">Enter CR Contact Number: </label>
										<input type="tel" pattern="^\d{10}$" class="form-control" name="course_cr_num" id="course_cr_num" placeholder="Enter CR Contact Number" required>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label for="course_cr_email">Enter CR Email Id: </label>
										<input type="email" class="form-control" name="course_cr_email" id="course_cr_email" placeholder="Enter CR Email Id" required>
									</div>
									<div class="form-group">
										<label for="course_sr_name">Enter SR Name: </label>
										<input type="text" class="form-control" name="course_sr_name" id="course_sr_name" placeholder="Enter SR Name" required>
									</div>
									<div class="form-group">
										<label for="course_sr_num">Enter SR Contact Number: </label>
										<input type="tel" pattern="^\d{10}$" class="form-control" name="course_sr_num" id="course_sr_num" placeholder="Enter SR Contact Number" required>
									</div>
									<div class="form-group">
										<label for="course_sr_email">Enter SR Email Id: </label>
										<input type="email" class="form-control" name="course_sr_email" id="course_sr_email" placeholder="Enter SR Email Id" required>
									</div>
									<div class="form-group">
										<label for="Course_name">Select Co-ordinator: </label>
										
										<?php
											$sql1="SELECT cc_name From course_coordinator where type='Course Co-ordinator'";
											$query1 = mysqli_query($conn, $sql1);
											//$row = mysqli_num_rows($sql);
									
												echo "<select class='form-control' name='cc_name'>";
												while ($row1 = mysqli_fetch_array($query1))
												{
													$rs1[]=$row1;
												}
												for($i=0;$i<count($rs1);$i++)
												{
													echo "<option value='". $rs1[$i]['cc_name'] ."'>" .$rs1[$i]['cc_name'] ."</option>" ;
												}
												echo "</select>" ;

											?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="float-lg-right">
										<input class="btn btn-outline-secondary" type="submit" value="Add Course" name="submit">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div><br><br>
			</div>
		</div>
		<?php include('admin_footer.php'); ?>
	</body>
</html>