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
				</ul>
				<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
						<h3>Active Allocations:</h3>
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
							<table class="table-bordered text-center" cellpadding="10px" id="view_table">
								<tr>
									<th>Day</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Subject Name</th>
									<th>Classroom Number</th>
									
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
		<?php include('admin_footer.php'); ?>
	</body>
</html>