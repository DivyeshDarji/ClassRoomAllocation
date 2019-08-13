<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Classroom Allocation System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body>
		<div class="background"></div>
		<div class="container card layer">
			<div class="row">
				<div class="col-sm-6 text-justify" >
					<h2 class="name">NMIMS</h2>
					<h5>Welcome to NMIMS University</h5>
					<p>You are about to log in to the world of Online Learning at NMIMS, a world made possible due to a combination of 30 years of legacy of best in class education and state of the art learning technology! Log in using the credentials given by the University. Please go through your profile details and update your contact information, it will help University to stay in touch with you.
					<br><br>
					<p>With this Portal, we hope to provide you all the support you need during your enrollment with the Program offered by the University. It will be our endeavour to keep improving your experience with this Portal as we go along.</p>
				</div>
				<div class="col-sm-1"></div>
				<div class="col-sm-5 login_form font-weight-bold">
					<form action="PHP/login.php" method="post">
						<div class="form-group">
							<label for="username">Username/Email Id:</label>
							<input type="email" class="form-control" name="login_email" id="login_email" placeholder="Enter Email Id">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter Password">
						</div>
						<div class="checkbox">
							<label for="remember"><input type="checkbox" name="remember" id="remember"> Remember Me</label>
						</div>
						<div>
							<input type="submit" class="btn font-weight-bold btn-outline-light" value="Get me in">
						</div>
						<?php
						if(isset($_GET['result']) && $_GET['result'] == 1){
							
							echo '<br><p style="color:red">Email Id/Password is invalid</p>';
							 }
						?>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
	