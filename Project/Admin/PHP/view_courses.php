<?php

	echo '
		include("../PHP/connect.php");
							
							if(!isset($_SESSION["login_user"]))
							{
								header("location:../index.php");
							}
							
							$query="Select * from course INNER JOIN course_coordinator ON course.course_cc_id=course_coordinator.cc_id";
							$result=mysqli_query($conn, $query);
							//$row=mysqli_fetch_array($result);
							while($row = mysqli_fetch_array($result))
							{
								$rs[]=$row;
							}
							
			'

?>