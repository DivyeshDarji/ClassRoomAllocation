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
							if($_SERVER["REQUEST_METHOD"] == "POST") 
							{
								$course_id=$_REQUEST['course_id'];
								
								$query="Select * from lecture where lec_course_id='$course_id'";
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
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
								</tr>
								<tr>
									<th>8.00-9.00</th>
									<td></td>
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
						<h3>Add Timetable:</h3>		  
						<form action="PHP/add_timetable.php" method="post">
							<div class="table-responsive">
								<table class="table-bordered text-center" cellpadding="6px" id="view_table">
									<tr>
										<th></th>
										<th name="monday">Monday</th>
										<th name="tuesday">Tuesday</th>
										<th name="wednesday">Wednesday</th>
										<th name="thursday">Thursday</th>
										<th name="friday">Friday</th>
										<th name="saturday">Saturday</th>
									</tr>
									
									<?php 
										$sql1='SELECT subject_name From subjects where s_course_id="'.$_SESSION['course'].'"';
										$query1 = mysqli_query($conn, $sql1);
										//$row = mysqli_num_rows($sql);
										while ($row1 = mysqli_fetch_array($query1))
										{
											$rs1[]=$row1;
										}
										
										$sql2="SELECT classroom_number From classroom";
										$query2 = mysqli_query($conn, $sql2);
										while ($row2 = mysqli_fetch_array($query2))
										{
											$rs2[]=$row2;
										}
									?>
									<tr>
									
									<th>8.00-9.00</th>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
								</tr>
								<tr>
									
									<th>9.00-10.00</th>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
									<td><?php include('selecting_lecture.php'); ?></td>
								</tr>
									<tr>
										<th>10.00-11.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>11.00-12.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>12.00-1.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>1.00-2.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>2.00-3.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>3.00-4.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>4.00-5.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
									<tr>
										<th>5.00-6.00</th>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
										<td><?php include('selecting_lecture.php') ?></td>
									</tr>
								</table>
							</div>
							<input type="submit" class="btn btn-outline-secondary" value="Add Timetable">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>