<?php
	session_start();
	if(isset($_POST['submit']))
	{
		global $flag;
		$flag=0;
		include('../../PHP/connect.php');
		$lec_day=$_POST['lecture_day'];
		$subject=$_POST['subject_name'];
		$lec_starttime=$_POST['lec_starttime'];
		$lec_endtime=$_POST['lec_endtime'];
		$classroom_type=$_POST['classroom_type'];
		$classroom_system=$_POST['classroom_system'];
		$classroom_capacity_required=$_POST['classroom_capacity'];
		$course_id=$_SESSION['course'];
		$cc_id=$_SESSION['login_user'];
		
		$query5="delete from classroomallocation where allc_validTillDate<now()";
		$result5=mysqli_query($conn,$query5);
		if($classroom_type=="Classroom" && $classroom_system=="White Board")
		{
			$query="Select * from classroom where room_type='Classroom' and system='White Board' order by capacity";
			$result=mysqli_query($conn,$query);	
			while($row=mysqli_fetch_array($result))
			{
				$classroom_no=$row['classroom_number'];
				$classroom_capacity=$row['capacity'];
		
				$query1="Select * from lecture where lec_classroom_number='".$classroom_no."' and lec_day='".$lec_day."' and lec_start_time>='".$lec_starttime."' and lec_end_time<='".$lec_endtime."'";
				$result1=mysqli_query($conn,$query1);
					
				if(mysqli_num_rows($result1)==0)
				{
					$query2="Select * from classroomallocation where allc_classroom_number='".$classroom_no."' and allc_day='".$lec_day."' and allc_start_time>='".$lec_starttime."' and allc_end_time<='".$lec_endtime."'";
					$result2=mysqli_query($conn,$query2);
					if(mysqli_num_rows($result2)==0)
					{
						if($classroom_capacity_required<=$classroom_capacity)
						{
							$query5="select * from subjects where subject_name='$subject' and s_course_id='$course_id'";
							$result5=mysqli_query($conn,$query5);
							$row5=mysqli_fetch_array($result5);
							$subject_id=$row5['subject_id'];
							$faculty_id=$row5['s_faculty_id'];
							$query4="INSERT INTO `classroomallocation` (`allc_day`, `allc_start_time`, `allc_end_time`, `allc_course_id`, `allc_cc_id`,`allc_subject_id`,`allc_faculty_id`, `allc_classroom_number`,`allc_createDate`,`allc_validTillDate`) VALUES ('$lec_day', '$lec_starttime', '$lec_endtime', '$course_id', '$cc_id','$subject_id','$faculty_id', '$classroom_no',NOW(),ADDDATE(NOW(), INTERVAL 1 DAY))";
							if(mysqli_query($conn,$query4))
							{
								header('location: ../search_classroom.php?classroom_no='.$classroom_no);
								//$flag=1;
								break;
							}
							else
							{
								header('location: ../search_classroom.php?result=1');
							}
						}
					}
				}
			}
		}
		else if($classroom_type=="Lab" && $classroom_system=="White Board")
		{
			$query="Select * from classroom where room_type='Lab' and system='White Board' order by capacity";
			$result=mysqli_query($conn,$query);	
			while($row=mysqli_fetch_array($result))
			{
				$classroom_no=$row['classroom_number'];
				$classroom_capacity=$row['capacity'];
				
				$query1="Select * from lecture where lec_classroom_number='".$classroom_no."' and lec_day='".$lec_day."' and lec_start_time>='".$lec_starttime."' and lec_end_time<='".$lec_endtime."'";
				$result1=mysqli_query($conn,$query1);
					
				if(mysqli_num_rows($result1)==0)
				{
					$query2="Select * from classroomallocation where allc_classroom_number='".$classroom_no."' and allc_day='".$lec_day."' and allc_start_time>='".$lec_starttime."' and allc_end_time<='".$lec_endtime."'";
					$result2=mysqli_query($conn,$query2);
					if(mysqli_num_rows($result2)==0)
					{
						if($classroom_capacity_required<=$classroom_capacity)
						{
							$query5="select * from subjects where subject_name='$subject' and s_course_id='$course_id'";
							$result5=mysqli_query($conn,$query5);
							$row5=mysqli_fetch_array($result5);
							$subject_id=$row5['subject_id'];
							$faculty_id=$row5['s_faculty_id'];
							$query4="INSERT INTO `classroomallocation` (`allc_day`, `allc_start_time`, `allc_end_time`, `allc_course_id`, `allc_cc_id`,`allc_subject_id`,`allc_faculty_id`, `allc_classroom_number`,`allc_createDate`,`allc_validTillDate`) VALUES ('$lec_day', '$lec_starttime', '$lec_endtime', '$course_id', '$cc_id','$subject_id','$faculty_id', '$classroom_no',NOW(),ADDDATE(NOW(), INTERVAL 1 DAY))";
							if(mysqli_query($conn,$query4))
							{
								header('location: ../search_classroom.php?classroom_no='.$classroom_no);
									//$flag=1;
								break;
							}
							else
							{
								header('location: ../search_classroom.php?result=1');
							}
						}
					}
				}
			}
		}
		if($classroom_type=="Classroom" && $classroom_system=="Smart Board")
		{
			$query="Select * from classroom where room_type='Classroom' and system='Smart Board' order by capacity";
			$result=mysqli_query($conn,$query);	
			while($row=mysqli_fetch_array($result))
			{
				$classroom_no=$row['classroom_number'];
				$classroom_capacity=$row['capacity'];
		
				$query1="Select * from lecture where lec_classroom_number='".$classroom_no."' and lec_day='".$lec_day."' and lec_start_time>='".$lec_starttime."' and lec_end_time<='".$lec_endtime."'";
				$result1=mysqli_query($conn,$query1);
					
				if(mysqli_num_rows($result1)==0)
				{
					$query2="Select * from classroomallocation where allc_classroom_number='".$classroom_no."' and allc_day='".$lec_day."' and allc_start_time>='".$lec_starttime."' and allc_end_time<='".$lec_endtime."'";
					$result2=mysqli_query($conn,$query2);
					if(mysqli_num_rows($result2)==0)
					{
						if($classroom_capacity_required<=$classroom_capacity)
						{
							$query5="select * from subjects where subject_name='$subject' and s_course_id='$course_id'";
							$result5=mysqli_query($conn,$query5);
							$row5=mysqli_fetch_array($result5);
							$subject_id=$row5['subject_id'];
							$faculty_id=$row5['s_faculty_id'];
							$query4="INSERT INTO `classroomallocation` (`allc_day`, `allc_start_time`, `allc_end_time`, `allc_course_id`, `allc_cc_id`,`allc_subject_id`,`allc_faculty_id`, `allc_classroom_number`,`allc_createDate`,`allc_validTillDate`) VALUES ('$lec_day', '$lec_starttime', '$lec_endtime', '$course_id', '$cc_id','$subject_id','$faculty_id', '$classroom_no',NOW(),ADDDATE(NOW(), INTERVAL 1 DAY))";
							if(mysqli_query($conn,$query4))
							{
								header('location: ../search_classroom.php?classroom_no='.$classroom_no);
								//$flag=1;
								break;
							}
							else
							{
								header('location: ../search_classroom.php?result=1');
							}
						}
					}
				}
			}
		}
		else if($classroom_type=="Lab" && $classroom_system=="Smart Board")
		{
			$query="Select * from classroom where room_type='Lab' and system='Smart Board' order by capacity";
			$result=mysqli_query($conn,$query);	
			while($row=mysqli_fetch_array($result))
			{
				$classroom_no=$row['classroom_number'];
				$classroom_capacity=$row['capacity'];
				
				$query1="Select * from lecture where lec_classroom_number='".$classroom_no."' and lec_day='".$lec_day."' and lec_start_time>='".$lec_starttime."' and lec_end_time<='".$lec_endtime."'";
				$result1=mysqli_query($conn,$query1);
					
				if(mysqli_num_rows($result1)==0)
				{
					$query2="Select * from classroomallocation where allc_classroom_number='".$classroom_no."' and allc_day='".$lec_day."' and allc_start_time>='".$lec_starttime."' and allc_end_time<='".$lec_endtime."'";
					$result2=mysqli_query($conn,$query2);
					if(mysqli_num_rows($result2)==0)
					{
						if($classroom_capacity_required<=$classroom_capacity)
						{
							$query5="select * from subjects where subject_name='$subject' and s_course_id='$course_id'";
							$result5=mysqli_query($conn,$query5);
							$row5=mysqli_fetch_array($result5);
							$subject_id=$row5['subject_id'];
							$faculty_id=$row5['s_faculty_id'];
							
							$query4="INSERT INTO `classroomallocation` (`allc_day`, `allc_start_time`, `allc_end_time`, `allc_course_id`, `allc_cc_id`,`allc_subject_id`,`allc_faculty_id`, `allc_classroom_number`,`allc_createDate`,`allc_validTillDate`) VALUES ('$lec_day', '$lec_starttime', '$lec_endtime', '$course_id', '$cc_id','$subject_id','$faculty_id', '$classroom_no',NOW(),ADDDATE(NOW(), INTERVAL 1 DAY))";
							if(mysqli_query($conn,$query4))
							{
								header('location: ../search_classroom.php?classroom_no='.$classroom_no);
									//$flag=1;
								break;
							}
							else
							{
								header('location: ../search_classroom.php?result=1');
							}
						}
					}
				}
			}
		}
		
		
			/*if($flag==1)
			{
				header('location: ../search_classroom.php?classroom_no=$classroom_no');
			}
			else
			{
				header('location: ../search_classroom.php?result=1');
			}*/
	}
	
?>