<?php 
include("../PHP/session.php")
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
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view">View</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add">Add</a></li>
					</ul>
					<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
						<?php
							include("../PHP/connect.php");
							
							if(!isset($_SESSION["login_user"]))
							{
								header("location:../index.php");
							}
							
							$query="Select * from lecture INNER JOIN course_coordinator ON course.course_cc_id=course_coordinator.cc_id";
							$result=mysqli_query($conn, $query);
							//$row=mysqli_fetch_array($result);
							while($row = mysqli_fetch_array($result))
							{
								$rs[]=$row;
							}
							
						?>
						<?php //include('PHP/view_courses.php'); ?>
						<div class="table-responsive">
							<table class="table-bordered" cellpadding="8px" id="view_table">
								
								<tr>
									<th rowspan="2">Course Name</th>
									<th rowspan="2">Semester</th>
									<th rowspan="2">Division</th>
									<th colspan="3">CR Details</th>
									<th colspan="3">SR Details</th>
									<th rowspan="2">Co-ordinator</th>
									<th colspan="2" rowspan="2">Action</th>
								</tr>
								<tr>
									<th>Name</th>
									<th>Contact Number</th>
									<th>Email Id</th>
									<th>Name</th>
									<th>Contact Number</th>
									<th>Email Id</th>
								</tr>
								<?php
									for($i = 0; $i < count($rs); $i++)
									{
								?>
								<tr>
									<td><?php echo $rs[$i]['course_name'] ?></td>
									<td><?php echo $rs[$i]['course_sem'] ?></td>
									<td><?php echo $rs[$i]['course_division'] ?></td>
									<td><?php echo $rs[$i]['course_cr_name'] ?></td>
									<td><?php echo $rs[$i]['course_cr_contactnum'] ?></td>
									<td><?php echo $rs[$i]['course_cr_email'] ?></td>
									<td><?php echo $rs[$i]['course_sr_name'] ?></td>
									<td><?php echo $rs[$i]['course_sr_contactnum'] ?></td>
									<td><?php echo $rs[$i]['course_sr_email'] ?></td>
									<td><?php echo $rs[$i]['cc_name'] ?></td>
									<td><a href="PHP/update_course.php">Update</a></td>
									<td><a href="PHP/delete_course.php?name=<?php echo $rs[$i]['course_name']; ?>&semester=<?php echo $rs[$i]['course_sem']; ?>&division=<?php echo $rs[$i]['course_division'] ?>">Delete</a></td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
					<div id="add" class="container tab-pane">
						<h3>Add Faculty:</h3>		  
						<form action="PHP/add_lecture.php" method="post">
							<div class="row">
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label for="Course_name">Enter Course Name: </label>
										<input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course Name" required>
									</div>
									<div class="form-group">
										<label for="Semester">Select Semester: </label>
										<select class="form-control" id="semester_no" name="semester_no"required>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
										</select>
									</div>
									<div class="form-group">
										<label for="Course_name">Select Division: </label>
										<select class="form-control" id="division" name="division" required>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
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
											$sql="SELECT cc_name From course_coordinator";
											$query = mysqli_query($conn, $sql);
											//$row = mysqli_num_rows($sql);
								
												echo "<select class='form-control' name='cc_name'>";
												while ($row = mysqli_fetch_array($query))
												{
													echo "<option value='". $row['cc_name'] ."'>" .$row['cc_name'] ."</option>" ;
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
				</div>
			</div>
	</body>
</html>