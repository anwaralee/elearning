<div class='h_left'><h1>Your Course History</h1></div>
<div class="seperator"></div>
<button onclick="javascript:history.go(-1);" class="btn">Go back</button>
<div class="seperator"></div>
<?php 
	$i=1;
	if($history!=NULL)
	{
	?>
        <table>
    	<tr>
        	<td><strong>S.N</strong></td>
            <td><strong>Course Learnt</strong></td>
            <td><strong>Course File Learnt</strong></td>
            <td><strong>Learnt Date</strong></td>
            <td><strong>Course view mode</strong></td>
        </tr>
	  <?php	
	  while($log=mysql_fetch_assoc($history))
		{
			$c_id=$log['course_id'];
			$c_name=$this->course_model->getCourse($c_id);
			$c_file=$this->course_model->getCourseFile($c_id);	
			echo "<tr><td>".$i."</td><td>".$c_name."</td><td>".$c_file."</td><td>".$log['course_view_date']."</td><td>";
			if($log['course_view_type']==1) echo "Viewed";
			else if($log['course_view_type']==2) echo "Downloaded";	
			else echo "Undistinguished";
			echo "</td></tr>";
			$i++;
		}
		?>
    </table>
    <div class="seperator"></div>
<?php	
}
else if($history==NULL) echo "<br><br>You have not learnt any courses yet.";
?>
