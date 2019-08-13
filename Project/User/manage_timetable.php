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
					<li><a href="#">Manage Timetable</a></li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#view">View</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#add">Add</a></li>
				</ul>
				<div class="tab-content">
					<div id="view" class="container tab-pane active">
						<br>
						<h3>View Timetable</h3>
						<?php
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
							
								$course_id=$_SESSION['course'];
								
								$query="Select * from lecture";
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
									<th></th>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
								</tr>
								<?php			
									for($i=0;$i<10;$i++)
									{
										$starttime=8;
										$endtime=9;
										$lec_starttime=($starttime+$i);
										$lec_endtime=($endtime+$i);
										echo "<tr>";
								?>
									<th>
										<input type="hidden" name="starttime" value="<?php echo ''.($starttime+$i).'' ?>">
										<input type="hidden" name="endtime" value="<?php echo ''.($endtime+$i).'' ?>">
										<?php echo ($starttime+$i).":00 - ".($endtime+$i).":00" ?>
									</th>
								<?php 
										for($j=0;$j<6;$j++)
										{
											
											$weekdays=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
											$query2="Select * from lecture INNER JOIN subjects ON lecture.lec_subject_id=subjects.subject_id where lec_day='$weekdays[$j]' and lec_start_time='$lec_starttime' and lec_end_time='$lec_endtime'";
											$result2=mysqli_query($conn,$query2);
											if($row2=mysqli_fetch_array($result2))
											{
												
											
								?>
									<td><?php echo $row2['subject_name']; ?><br>
										<?php echo $rs[$j]['lec_classroom_number']; ?>
									</td>
								<?php
												
											}
										}
								?>
								</tr>
								<?php 
									}
								?>
							</table>
						</div>	
						<div class="float-lg-right">
							<button class="btn btn-light btn-outline-secondary" type="button"><a style="text-decoration:none" href="PHP/delete_timetable.php?id=<?php echo $_SESSION['course'] ?>">Delete Timetable</a></button>
						</div>
						<?php 
							}
						?>
					</div><br><br>
					
					<div id="add" class="container tab-pane">
						<h3>Add Timetable:</h3>		  
						<form action="PHP/add_timetable.php" method="post">
							<div class="table-responsive">
								<table class="table-bordered text-center" cellpadding="6px" id="view_table">
									<tr>
										<th></th>
										<th name="monday"><input type="hidden" name="monday" value="Monday">Monday</th>
										<th name="tuesday"><input type="hidden" name="tuesday" value="Tuesday">Tuesday</th>
										<th name="wednesday"><input type="hidden" name="wednesday" value="Wednesday">Wednesday</th>
										<th name="thursday"><input type="hidden" name="thursday" value="Thursday">Thursday</th>
										<th name="friday"><input type="hidden" name="friday" value="Friday">Friday</th>
										<th name="saturday"><input type="hidden" name="saturday" value="Saturday">Saturday</th>
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
									
										
										<?php
											$starttime=8;
											$endtime=9;
											for($i=0;$i<10;$i++)
											{
												echo "<tr>";
										?>
												<th>
												<input type="hidden" name="starttime" value="<?php echo ''.($starttime+$i).'' ?>">
												<input type="hidden" name="endtime" value="<?php echo ''.($endtime+$i).'' ?>">
												<?php echo ($starttime+$i).":00 - ".($endtime+$i).":00" ?>
												</th>
												
										<?php
												for($j=0;$j<6;$j++)
												{	
										?>
													
													<td>
													<select class="form-control" name="subject_name<?php echo $i."".$j?>"><option>Subject</option>
										<?php	
												
												for($i1=0; $i1<count($rs1); $i1++)
												{
													echo "<option value='". $rs1[$i1]['subject_name'] ."'>" .$rs1[$i1]['subject_name'] ."</option>" ;
												}
												echo "</select>";
										?>
												<select class="form-control" name="classroom_no<?php echo $i."".$j?>"><option>Classroom</option>
										<?php
												for($i2=0;$i2<count($rs2);$i2++)
												{
													echo "<option value='". $rs2[$i2]['classroom_number'] ."'>" .$rs2[$i2]['classroom_number'] ."</option>" ;
												}
												
													echo "</select></td>";
												}
												echo "</tr>";
											}
										?>
									</tr>
									
								</table>
							</div>
							<br>
							<div class="float-lg-right">
								<input type="submit" class="btn btn-outline-secondary" value="Add Timetable" name="submit">
							</div>
						</form>
					</div>
				</div>
			</div><br><br><br>
		</div>
		<?php include('user-footer.php'); ?>
	</body>
</html>
