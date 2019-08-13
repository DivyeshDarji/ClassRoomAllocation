<?php 
	session_start();
	include('../PHP/connect.php');
	$query2="select * from course where course_id='".$_SESSION['course']."'";
	$result2=mysqli_query($conn,$query2);
	$row2=mysqli_fetch_array($result2);
	if(isset($_GET['id']))
	{
		$subject_id=$_GET['id'];
		$query="Select * from subjects where subject_id='$subject_id'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_array($result);
	}

	if(isset($_POST['submit']))
	{
		$subject_name=$_POST['subject_name'];
		$faculty_name=$_POST['faculty_name'];
		$query="select faculty_id from faculty where faculty_name='$faculty_name'";
		$result=mysqli_query($conn, $query);
		$row=mysqli_fetch_array($result);
		$faculty_id=$row['faculty_id'];
		
		$query="update subjects set subject_name='$subject_name', s_faculty_id='$faculty_id' where subject_id='$subject_id'";
		if(mysqli_query($conn,$query))
		{
			header('location:manage_subjects.php?result=0');
		}
		else
		{
			header('location:manage_subjects.php?result=1');
		}
	}
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
					<li><a href="user_home.php"><?php echo $row2['course_name'] ?> Sem <?php echo $row2['course_sem'] ?> <?php echo $row2['course_division'] ?></a></li>
					<li><a href="#">Update Subject</a></li>
				</ul>
				<h3>Update subject:</h3>		  
				<form method="post">
					<div class="row">
						<div class="col-lg-12 col-sm-12">
							<div class="form-group">
								<label for="subject_name">Enter Subject Name: </label>
								<input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Enter Subject Name" required>
							</div>
							<div class="form-group">
								<label for="faculty_contactnum">Enter Faculty Name: </label>
								<?php
									$sql1="SELECT * From faculty where faculty_course_id='".$_SESSION['course']."'";
									$query1 = mysqli_query($conn, $sql1);
									//$row = mysqli_num_rows($sql);
									echo "<select class='form-control' name='faculty_name'>";
									while ($row1 = mysqli_fetch_array($query1))
									{
										$rs1[]=$row1;
									}
									for($i=1;$i<count($rs1);$i++)
									{
								?>
										<option value="<?php echo $rs1[$i]['faculty_name'] ?>" <?php if($rs1[$i]['faculty_id']==$row['s_faculty_id']) echo "selected"; ?>><?php echo $rs1[$i]['faculty_name'] ?></option>
								<?php
									}
									echo "</select>" ;
								?>
							</div>
						</div>
					</div>
					<div class="float-lg-right">
						<input class="btn btn-outline-secondary" type="submit" value="Update subject" name="submit">
					</div>
				</form>
			</div>
		</div><br><br>
		<?php include('user-footer.php'); ?>
	</body>
</html>