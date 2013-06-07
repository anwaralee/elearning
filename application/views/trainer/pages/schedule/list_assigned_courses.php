<div class="h_left"><h2>Assigned Courses</h2></div>
<div class="seperator"></div>
<?php if(!empty($allCourses)){?>
<table width="90%">
<tr>
<th>S/N</th>
<th>Session</th>
<th>Course</th>
<th>Date</th>
<th>Action</th>
</tr>



<?php
if($allCourses)
{
	$i = 0;
	foreach($allCourses as $course):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
                        <td class='c_right'><?php echo $course->session_name;?></td>
			<td class='c_right'><?php echo $this->schedule_model->getCourseNameById($course->course_id)->course_name;?></td>
                        <td class='c_right'><?php echo $this->schedule_model->getStartDate($course->session_id)->training_date;?></td>
                        <td class='action'>
				<a href ="<?php echo base_url();?>schedules/list_schedule/<?php echo $course->session_id;?>" class='btn btn-info'>View Details</a>
			</td>
                       
		</tr>
	<?php
		endforeach;
}
?>

</table>
<?php } else {?>
<h3> No Assigned Courses found</h3>
<?php } ?>
