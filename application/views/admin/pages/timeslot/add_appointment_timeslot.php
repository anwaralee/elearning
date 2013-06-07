<div class="h_left"><h2>Add New Time Slot</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url(); ?>timeslot/addAppointmentTimeslot" method="post">
    <h3>Day:</h3>
    <select name="day_id"/>
        <option value="0">Select avaliable Day</option>
        <?php if ($selectedDays->day_sun) { ?>
            <option value="1">Sunday</option>
        <?php } ?>
        <?php if ($selectedDays->day_mon) { ?>
            <option value="2">Monday</option>
        <?php } ?>
        <?php if ($selectedDays->day_tue) { ?>
            <option value="3">Tuesday</option>
        <?php } ?>
        <?php if ($selectedDays->day_wed) { ?>
            <option value="4">Wednesday</option>
        <?php } ?>
        <?php if ($selectedDays->day_thu) { ?>
            <option value="5">Thursday</option>
        <?php } ?>
        <?php if ($selectedDays->day_fri) { ?>
            <option value="6">Friday</option>
        <?php } ?>
        <?php if ($selectedDays->day_sat) { ?>
            <option value="7">Saturday</option>
        <?php } ?>
</select>
    
        <h3>Start Time:</h3>
        <input type="text" name="start_time"/>
        <h3>End Time:</h3>
        <input type="text" name="end_time"/> <br/>

        <input type="submit" value=" Add " class="btn btn-primary">
        </form>
