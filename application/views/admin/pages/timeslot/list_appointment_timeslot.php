<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the timeslot for appointment?");	
}
</script>
<div class="h_left"><h2>Appointment Time Slot Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>timeslot/add_appointment_timeslot" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>
<?php
if(!empty($allAppointmentsTimeslots))
{
    ?>
<table width="50%">
<tr>
<th>S/N</th>
<th>Day</th>
<th>Time Slot</th>
<th>Action</th>
</tr>



<?php 
	$i = 0;
	foreach($allAppointmentsTimeslots as $appointment):
		$i++; ?>
		<tr>
                    <td><?php echo $i;?></td>
                    <td><?php if($appointment->day_id==1){
                                 echo "Sunday";
                             }
                             else if($appointment->day_id==2){
                                 echo "Monday";
                             }
                              else if($appointment->day_id==3){
                                 echo "Tuesday";
                             }
                              else if($appointment->day_id==4){
                                 echo "Wednesday";
                             }
                              else if($appointment->day_id==5){
                                 echo "Thursday";
                             }
                              else if($appointment->day_id==6){
                                 echo "Friday";
                             }
                              else if($appointment->day_id==7){
                                 echo "Saturday";
                             }
                             ?></td>
                    <td class='c_right'><?php echo $appointment->start_time." to ".$appointment->end_time?></td>
                    <td class='action'><a href= "<?php echo base_url()?>timeslot/remove_appointment_timeslot/<?php echo $appointment->id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a></td></tr>
	<?php endforeach;
?>
 </table>       
<?php 

} else {
?>
<h3>No Appointment Time Slots found</h3>
<?php }?>
