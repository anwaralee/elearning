<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the schedule?");	
}
</script>
<div class="h_left"><h2>Schedule for <?php echo $date ?> <?php echo $day;?></h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>schedule/add/<?php echo $date; ?>/<?php echo $day;?>" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<table width="80%">
<tr>
<th>S/N</th>
<th>Time</th>
<!--th>Title</th-->
<th>Course</th>
<th>Session</th>
<th>Lesson</th>
<th>Trainer</th>
<th>Action</th>
</tr>



<?php
if($schedulesByDate)
{
	$i = 0;
	foreach($schedulesByDate as $schedule):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<!--td class='c_right'><?php echo $schedule->training_title;?></td-->
                       	<td class='c_right'><?php echo $this->schedule_model->getTrainingTimeById($schedule->timeslot_id)->time;?></td>
                        <td class='c_right'><?php echo $this->schedule_model->getCourseNameById($schedule->course_id)->course_name;?></td>
			<td class='c_right'><?php echo $this->schedule_model->getSessionNameById($schedule->session_id)->session_name;?></td>
                        <td class='c_right'><?php echo $this->schedule_model->getLessonNameById($schedule->lesson_id)->lesson_name;?></td>
			<td class='c_right'>
                            <?php echo $this->schedule_model->getTrainerNameById($schedule->trainer_id)->firstname." ".$this->schedule_model->getTrainerNameById($schedule->trainer_id)->lastname;?></td>
			<td class='action'>
					<a href="<?php echo base_url();?>schedule/remove_schedule/<?php echo $schedule->training_id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
					<a href ="<?php echo base_url();?>schedule/edit_schedule/<?php echo $date; ?>/<?php echo $day;?>/<?php echo $schedule->training_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>