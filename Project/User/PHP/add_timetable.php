<?php

	session_start();
	include('../../PHP/connect.php');
	if(isset($_POST['submit']))
	{
		$starttime=8;
		$endtime=9;
		$course_id=$_SESSION['course'];	
		for($i=0;$i<10 ;$i++)
		{
			$lec_start_time=($starttime+$i);
			$lec_end_time=($endtime+$i);
			
			for($j=0;$j<6;$j++)
			{
				$id=$_POST['subject_name'.$i.$j];
				$query1="select * from subjects where subject_name='$id' and s_course_id='$course_id'";
				$result1=mysqli_query($conn,$query1);
				if($row=mysqli_fetch_array($result1))
				{
					$subject_id=$row['subject_id'];
					$faculty_id=$row['s_faculty_id'];
					$id1=$_POST['classroom_no'.$i.$j];
					$weekdays=array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
				
					$day=$weekdays[$j];
					$query="insert into lecture(`lec_day`,`lec_start_time`,`lec_end_time`,`lec_course_id`,`lec_subject_id`,`lec_faculty_id`,`lec_classroom_number`) values('$day','$lec_start_time','.$lec_end_time.','$course_id','$subject_id','$faculty_id','$id1')";
					if(mysqli_query($conn,$query))
					{
						header('location:../manage_timetable.php?result2=0');
					}
					else
					{
						header('location:../manage_timetable.php?result2=1');
					}
					
				}
				/*switch($j)
				{
					case 1:
					$day="Monday";
					break;
				
					case 2:
					$day="Tuesday";
					break;
				
					case 3:
					$day="Wednesday";
					break;
				
					case 4:
					$day="Thursday";
					break;
				
					case 5:
					$day="Friday";
					break;
					
					case 6:
					$day="Saturday";
					break;
					
					default:
					$day="Sunday";
				
				}*/
			}
			
		}
		/*foreach($_POST["subject_name"] as $value)
		{
			echo $value;
			//echo $_POST["classroom_no"][$value];
		}
		
		foreach($_POST["classroom_no"] as $value)
		{
			echo $value;
			//echo $_POST["classroom_no"][$value];
		}*/
		
	}
?>