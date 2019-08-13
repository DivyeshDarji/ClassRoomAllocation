<?php 
											echo '<select class="form-control" name="subject_name"><option>Subject</option>';
											for($i1=0; $i1<count($rs1); $i1++)
											{
												echo "<option value='". $rs1[$i1]['subject_name'] ."'>" .$rs1[$i1]['subject_name'] ."</option>" ;
											}
											echo "</select>";
											echo '<select class="form-control" name="classroom_no"><option>Classroom</option>';
											for($i2=0;$i2<count($rs2);$i2++)
											{
												echo "<option value='". $rs2[$i2]['classroom_number'] ."'>" .$rs2[$i2]['classroom_number'] ."</option>" ;
											}
											echo "</select>" ;
										?>