<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the course?");	
}
</script>
<div class="h_left"><h2>Schedule(s)</h2></div>
<div class="seperator"></div>
<?php if(!empty($allSchedules)){?>
<table width="90%">
<tr>
<th>S/N</th>
<th>Lesson</th>
<th>Date</th>
<th>Time</th>
<th>Action</th>
</tr>



<?php
if($allSchedules)
{
	$i = 0;
	foreach($allSchedules as $schedule):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $this->schedule_model->getLessonNameById($schedule->lesson_id)->lesson_name;?></td>
                        <td class='c_right'><?php echo $schedule->training_date;?></td>
                        <td class='c_right'><?php echo $this->schedule_model->getTrainingTimeById($schedule->timeslot_id)->time;?></td>
			<td class='action'>
				<a href ="<?php echo base_url();?>schedules/view_schedule_details/<?php echo $schedule->training_id;?>" class='btn btn-info'>View Details</a>
			</td>
                       
		</tr>
	<?php
		endforeach;
}
?>

</table>
<?php } else {?>
<h3> No Schedules found</h3>
<?php } ?>
