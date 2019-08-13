<?php 
session_start();
if(!isset($_SESSION["login_user"]))
{
	header("location:../index.php");
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
					<li><a href="#">Search Classroom</a></li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#search">Search</a></li>
					
				</ul>
				<div class="tab-content">
					<div id="search" class="container tab-pane active">
						<br>
						<h3>Enter Details:</h3>
						<?php
							if(isset($_GET['result']) && $_GET['result'] == 1)
							{
								echo '<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>No Classroom/Lab is available
									</div>';
							}
							else if(isset($_GET['classroom_no']))
							{
								$classroom=$_GET['classroom_no'];
						?>
							<div class='alert alert-success alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button><?php echo $classroom ?> is alloted</div>
						<?php
						} 
						?>
						<form action="PHP/allocate_classroom.php" method="post">
							<div class="row">
								<div class="col-lg-12 col-sm-12">
									<div class="form-group">
										<label for="lec_day">Enter Day: </label>
										<select class="form-control" name="lecture_day" required>
											<option>Monday</option>
											<option>Tuesday</option>
											<option>Wednesday</option>
											<option>Thursday</option>
											<option>Friday</option>
											<option>Saturday</option>
										</select>
									</div>
									<div class="form-group">
										<label for="subject_name">Enter Subject: </label>
										<?php
										include('../PHP/connect.php');
										
										$sql1='SELECT subject_name From subjects where s_course_id="'.$_SESSION['course'].'"';
											$query1 = mysqli_query($conn, $sql1);
											//$row = mysqli_num_rows($sql);
											while ($row1 = mysqli_fetch_array($query1))
											{
												$rs1[]=$row1;
											}
											echo '<select class="form-control" name="subject_name" required>';
												for($i1=0; $i1<count($rs1); $i1++)
												{
													echo "<option value='". $rs1[$i1]['subject_name'] ."'>" .$rs1[$i1]['subject_name'] ."</option>" ;
												}
											echo "</select>";
										?>
									</div>
									<div class="form-group">
										<label for="lec_starttime">Enter Start Time: </label>
										<input type="number" class="form-control" name="lec_starttime" id="lec_starttime" required>
									</div>
									<div class="form-group">
										<label for="lec_endtime">Enter End Time: </label>
										<input type="number" class="form-control" name="lec_endtime" id="lec_endtime" required>
									</div>
									<div class="form-group">
										<label for="classroom_type">Select Room Type:</label>
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
										<input type="number" class="form-control" name="classroom_capacity" id="classroom_capacity" placeholder="Enter Capacity">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="float-lg-right">
										<input class="btn btn-outline-secondary" type="submit" value="Search Classroom" name="submit">
									</div>
								</div>
							</div>
						</form>
						<!--<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>Classroom Number</th>
									<th>Floor</th>
									<th>Classroom type</th>
									<th>System type</th>
									<th>Capacity</th>
								</tr>
								<?php 
							//		for($i=0;$i<count($rs);$i++)
								//	{
								?>
								<tr>
									<td><?php// echo $rs['classroom_number']; ?></td>
								</tr>
								<?php 
									//}
								?>
							</table>
						</div>-->		
					</div>
				</div><br><br>
			</div>
		</div>
		<?php include('user-footer.php'); ?>
	</body>
</html>