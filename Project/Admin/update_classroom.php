<?php 
session_start();

include('../PHP/connect.php');
if(isset($_GET['id']))
{
	$classroom_number=$_GET['id'];
	$query="Select * from classroom where classroom_number='$classroom_number'";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
}

if(isset($_POST['submit']))
{
	$cr_floor=$_POST['floor'];
	$cr_no=$_POST['classroom_no'];
	$cr_type=$_POST['classroom_type'];
	$cr_system=$_POST['classroom_system'];
	$cr_capacity=$_POST['classroom_capacity'];
	
	$query="update classroom set floor='$cr_floor', classroom_number='$cr_no', room_type='$cr_type', system='$cr_system', capacity='$cr_capacity' where classroom_number='$classroom_number'";
	if(mysqli_query($conn,$query))
	{
		header('location:manage_classrooms.php?result=0');
	}
	else
	{
		header('location:manage_classrooms.php?result=1');
	}
}
	
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
			<div class="container">
				<h3>Add Classroom:</h3>
				<form method="post">
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="form-group">
								<label for="floor">Select Floor: </label>
								<select class="form-control" id="floor" name="floor" required>
									<option <?php if($row['floor']=="1") echo "selected"; ?>>1</option>
									<option <?php if($row['floor']=="2") echo "selected"; ?>>2</option>
									<option <?php if($row['floor']=="3") echo "selected"; ?>>3</option>
									<option <?php if($row['floor']=="4") echo "selected"; ?>>4</option>
									<option <?php if($row['floor']=="5") echo "selected"; ?>>5</option>
									<option <?php if($row['floor']=="6") echo "selected"; ?>>6</option>
									<option <?php if($row['floor']=="7") echo "selected"; ?>>7</option>
									<option	<?php if($row['floor']=="8") echo "selected"; ?>>8</option>
								</select>
							</div>
							<div class="form-group">
								<label for="classroom_no">Enter Classroom Number: </label>
								<input type="text" class="form-control" name="classroom_no" id="classroom_no" value="<?php echo $row['classroom_number'] ?>" required>
							</div>
							<div class="form-group">
								<label for="classroom_type">Select Classroom Type: </label>
								<select class="form-control" id="classroom_type" name="classroom_type" required>
									<option <?php if($row['room_type']=="Classroom") echo "selected"; ?>>Classroom</option>
									<option <?php if($row['room_type']=="Lab") echo "selected"; ?>>Lab</option>
								</select>
							</div>
								
							<div class="form-group">
								<label for="classroom_system">Select System Type: </label>
								<select class="form-control" id="classroom_system" name="classroom_system" required>
									<option <?php if($row['system']=="White Board") echo "selected"; ?>>White Board</option>
									<option <?php if($row['system']=="Smart Board") echo "selected"; ?>>Smart Board</option>
								</select>
							</div>
								
							<div class="form-group">
								<label for="classroom_capacity">Enter Capacity: </label>
								<input type="number" class="form-control" name="classroom_capacity" id="classroom_capacity" value="<?php echo $row['capacity'] ?>" required>
							</div>
						</div>
					</div>
					
					<div class="float-lg-right">
						<input class="btn btn-outline-secondary" type="submit" value="Update Classroom" name="submit">
					</div>
				</form>
			</div>
		</div><br><br><br>
		<?php include('admin_footer.php'); ?>
	</body>
</html
