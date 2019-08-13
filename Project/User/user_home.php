<?php 
session_start();
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
		<!--Top and Side Navbar Ends-->
		<br>
		<div class="container">
		
		<?php
			include("../PHP/connect.php");
							
			if(!isset($_SESSION["login_user"]))
			{
				header("location:../index.php");
			}
			$cc_id=$_SESSION['login_user'];
			$query="Select * from course where course_cc_id='$cc_id'";
			$result=mysqli_query($conn,$query);
			$count=mysqli_num_rows($result);
			if($count==0)
			{
		?>
		<p>No courses have been allocated to you</p>
		<?php
			}
			else
			{
				while($row=mysqli_fetch_array($result))
				{
					$rs[]=$row;
				}
		?>
		<div class="card-deck">
		<?php
				for($i = 0; $i < count($rs); $i++)
				{
		?>
		
			<div class="card card-custom">
				<div class="card-body text-center card_course_link">
				<form action="manage_faculty.php" method="post">
						<h4 class="card-title"><?php echo $rs[$i]['course_name'] ?></h4>
							<input type="hidden" name="course_id" value="<?php echo $rs[$i]['course_id'] ?>">
							<input type="submit" class="btn btn-light" name="mybutton" value="<?php echo "Semester ".$rs[$i]['course_sem']." ".$rs[$i]['course_division']; ?>">
						</form>
					</div>
				</div>
				<?php
				}
				?>
				
			</div>
			<?php
			}
			?>
		</div>
		<?php include('user-footer.php'); ?>
	</body>
</html>