<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the timeslot?");	
}
</script>
<div class="h_left"><h2>Training Time slot Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>schedule/add_timeslot" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<table width="50%">
<tr>
<th>S/N</th>
<th>Day</th>
<th>Time</th>
<th>Action</th>
</tr>


<?php
if($allTimeSlots)
{
	$i = 0;
	foreach($allTimeSlots as $timeslot):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'>
                             <?php if($timeslot->day_id==1){
                                 echo "Sunday";
                             }
                             else if($timeslot->day_id==2){
                                 echo "Monday";
                             }
                              else if($timeslot->day_id==3){
                                 echo "Tuesday";
                             }
                              else if($timeslot->day_id==4){
                                 echo "Wednesday";
                             }
                              else if($timeslot->day_id==5){
                                 echo "Thursday";
                             }
                              else if($timeslot->day_id==6){
                                 echo "Friday";
                             }
                              else if($timeslot->day_id==7){
                                 echo "Saturday";
                             }
                             ?>
                        </td>
			<td class='c_right'><?php echo $timeslot->time;?></td>
			<td class='action'>
					<a href="<?php echo base_url();?>schedule/remove_timeslot/<?php echo $timeslot->timeslot_id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
					<a href ="<?php echo base_url();?>schedule/edit_timeslot/<?php echo $timeslot->timeslot_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>