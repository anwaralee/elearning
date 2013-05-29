<div class="h_left"><h2>Edit new Time Slot</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url(); ?>schedule/updateTimeSlot/<?php echo $timeSlotById->timeslot_id;?>" method="post">
    <h3>Day:</h3>
    <select name="day_id">
        <option value="0">Select avaliable Day</option>
        <?php if ($selectedDays->day_sun) { ?>
            <option value="1" <?php echo (1==$timeSlotById->day_id)? "selected" : ""?>>Sunday</option>
        <?php } ?>
        <?php if ($selectedDays->day_mon) { ?>
            <option value="2" <?php echo (2==$timeSlotById->day_id)? "selected" : ""?>>Monday</option>
        <?php } ?>
        <?php if ($selectedDays->day_tue) { ?>
            <option value="3" <?php echo (3==$timeSlotById->day_id)? "selected" : ""?>>Tuesday</option>
        <?php } ?>
        <?php if ($selectedDays->day_wed) { ?>
            <option value="4" <?php echo (4==$timeSlotById->day_id)? "selected" : ""?>>Wednesday</option>
        <?php } ?>
        <?php if ($selectedDays->day_thu) { ?>
            <option value="5" <?php echo (5==$timeSlotById->day_id)? "selected" : ""?>>Thursday</option>
        <?php } ?>
        <?php if ($selectedDays->day_fri) { ?>
            <option value="6" <?php echo (6==$timeSlotById->day_id)? "selected" : ""?>>Friday</option>
        <?php } ?>
        <?php if ($selectedDays->day_sat) { ?>
            <option value="7" <?php echo (7==$timeSlotById->day_id)? "selected" : ""?>>Saturday</option>
        <?php } ?>


    </select>
    <a href="<?php echo base_url(); ?>schedule/configure_working_days" class="btn btn-inverse">Configure Working Days</a>
    <h3>Time Slot(example-> 10:00 AM - 10:30 AM):</h3>
    <input type="text" name="time" value="<?php echo $timeSlotById->time?>"/>



    <div class="seperator"></div>
    <input type="submit" value=" Update " class="btn btn-primary">
</form>
