<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the course?");	
}

</script>

<table width="90%">
<tr>
<th>S/N</th>
<th>Lesson</th>
<th>Date</th>
<th>Time</th>
<th>Course</th>
<th>Trainer</th>
<th>Action</th>
</tr>



<?php
if($allTrainings)
{
	$i = 0;
	foreach($allTrainings as $training):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $this->trainee_model->getLessonNameById($training->lesson_id)->lesson_name;?></td>
			<td class='c_right'><?php echo $training->training_date;?></td>
			<td class='c_right'><?php echo $this->trainee_model->getTimeSlotNameById($training->timeslot_id)->time;?></td>
			<td class='c_right'><?php echo $this->trainee_model->getCourseNameById($training->course_id)->course_name;?></td>
			<td class='c_right'><?php echo $this->trainee_model->getTrainerNameById($training->trainer_id)->firstname." ".$this->trainee_model->getTrainerNameById($training->trainer_id)->lastname;?></td>
			<td class='action'>
				<?php if($training->status==1){?>
				<a href ="<?php echo base_url();?>trainee/view_all_documents/<?php echo $training->lesson_id;?>" class='btn btn-info'>Go To Lesson</a>
				<?php } else if($training->status==0){?>
					<input disabled class='btn btn-info' value="Lesson Due to Start">
			<?php } else if($training->status==2){?>
				<a href ="<?php echo base_url();?>course/edit_course/<?php echo $training->training_id;?>" class='btn btn-info'>Go To Class Archive</a>
			<?php }?>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>