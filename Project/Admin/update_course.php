<?php 
	session_start();
	include('../PHP/connect.php');
	if(isset($_GET['id']))
	{
		$course_id=$_GET['id'];
		$query="Select * from course where course_id='$course_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
	}

	if(isset($_POST['submit']))
	{
		$course_name=$_POST['course_name'];
		$semester_no=$_POST['semester_no'];
		$division=$_POST['division'];
		$course_cr_name=$_POST['course_cr_name'];
		$course_cr_num=$_POST['course_cr_num'];
		$course_cr_email=$_POST['course_cr_email'];
		$course_sr_name=$_POST['course_sr_name'];
		$course_sr_num=$_POST['course_sr_num'];
		$course_sr_email=$_POST['course_sr_email'];
		$cc_name=$_POST['cc_name'];
		
		$query1=mysqli_query($conn,"select cc_id from course_coordinator where cc_name='$cc_name'");
		$row1=mysqli_fetch_array($query1);
		$cc_id=$row1['cc_id'];
		
		$query2="update course set course_name='$course_name', course_sem='$semester_no' , course_division='$division', course_cr_name='$course_cr_name', course_cr_contactnum='$course_cr_num', course_cr_email='$course_cr_email', course_sr_name='$course_sr_name', course_sr_contactnum='$course_sr_num', course_sr_email='$course_sr_email', course_cc_id='$cc_id' where course_id='$course_id'";
		if(mysqli_query($conn,$query2))
		{
			header('location:manage_courses.php?result=0');
		}
		else
		{
			echo mysqli_error($conn);
			//header('location:manage_courses.php?result=1');
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
				<h3>Update Course:</h3>		  
				<form method="post">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<div class="form-group">
								<label for="Course_name">Enter Course Name: </label>
								<input type="text" class="form-control" name="course_name" id="course_name" value="<?php echo $row['course_name'] ?>" required>
							</div>
							<div class="form-group">
								<label for="Semester">Select Semester: </label>
								<select class="form-control" id="semester_no" name="semester_no">
									<option <?php if($row['course_sem']=="I") echo "selected"; ?>>I</option>
									<option <?php if($row['course_sem']=="II") echo "selected"; ?>>II</option>
									<option <?php if($row['course_sem']=="III") echo "selected"; ?>>III</option>
									<option <?php if($row['course_sem']=="IV") echo "selected"; ?>>IV</option>
									<option <?php if($row['course_sem']=="v") echo "selected"; ?>>V</option>
									<option <?php if($row['course_sem']=="VI") echo "selected"; ?>>VI</option>
									<option <?php if($row['course_sem']=="VII") echo "selected"; ?>>VII</option>
									<option <?php if($row['course_sem']=="VIII") echo "selected"; ?>>VIII</option>
								</select>
							</div>
							<div class="form-group">
								<label for="Course_name">Select Division: </label>
								<select class="form-control" id="division" name="division">
									<option <?php if($row['course_division']=="A") echo "selected"; ?>>A</option>
									<option <?php if($row['course_division']=="B") echo "selected"; ?>>B</option>
									<option <?php if($row['course_division']=="C") echo "selected"; ?>>C</option>
									<option <?php if($row['course_division']=="d") echo "selected"; ?>>D</option>
									<option <?php if($row['course_division']=="E") echo "selected"; ?>>E</option>
									<option <?php if($row['course_division']=="F") echo "selected"; ?>>F</option>
								</select>
							</div>
							<div class="form-group">
								<label for="course_cr_name">Enter CR Name: </label>
								<input type="text" class="form-control" name="course_cr_name" id="course_cr_name" value="<?php echo $row['course_cr_name'] ?>" required>
							</div>
							<div class="form-group">
								<label for="course_cr_num">Enter CR Contact Number: </label>
								<input type="tel" pattern="^\d{10}$" class="form-control" name="course_cr_num" id="course_cr_num" value="<?php echo $row['course_cr_contactnum'] ?>" required>
							</div>
						</div>
						<div class="col-lg-6 col-sm-12">
							<div class="form-group">
								<label for="course_cr_email">Enter CR Email Id: </label>
								<input type="email" class="form-control" name="course_cr_email" id="course_cr_email" value="<?php echo $row['course_cr_email'] ?>" required>
							</div>
							<div class="form-group">
								<label for="course_sr_name">Enter SR Name: </label>
								<input type="text" class="form-control" name="course_sr_name" id="course_sr_name" value="<?php echo $row['course_sr_name'] ?>" required>
							</div>
							<div class="form-group">
								<label for="course_sr_num">Enter SR Contact Number: </label>
								<input type="tel" pattern="^\d{10}$" class="form-control" name="course_sr_num" id="course_sr_num" value="<?php echo $row['course_sr_contactnum'] ?>" required>
							</div>
							<div class="form-group">
								<label for="course_sr_email">Enter SR Email Id: </label>
								<input type="email" class="form-control" name="course_sr_email" id="course_sr_email" value="<?php echo $row['course_sr_email'] ?>" required>
							</div>
							<div class="form-group">
								<label for="Course_name">Select Co-ordinator: </label>
										
								<?php
									$sql1="SELECT * From course_coordinator where type='Course Co-ordinator'";
									$query1 = mysqli_query($conn, $sql1);
									//$row = mysqli_num_rows($sql);
							
									echo "<select class='form-control' name='cc_name'>";
									while ($row1 = mysqli_fetch_array($query1))
									{
										$rs1[]=$row1;
									}
									for($i=0;$i<count($rs1);$i++)
									{
								?>
								<option value="<?php echo $rs1[$i]['cc_name'] ?>" <?php if($row['course_cc_id']==$rs1[$i]['cc_id']) echo 'selected' ?> > <?php echo $rs1[$i]['cc_name'] ?>
								</option>
								<?php
									}
									echo "</select>" ;
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="float-lg-right">
								<input class="btn btn-outline-secondary" type="submit" value="Update Course" name="submit">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div><br><br>
		<?php include('admin_footer.php'); ?>
	</body>
</html>