<div class="h_left"><h2>Add New Time Slot</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>timeslot/addAppointmentTimeslot" method="post">
<h3>Start Time:</h3>
<input type="text" name="start_time"/>
<h3>End Time:</h3>
<input type="text" name="end_time"/>

<input type="submit" value=" Add " class="btn btn-primary">
</form>
