<?php if(!empty($timeSlots)) { ?>
    <?php foreach($timeSlots as $timeslot):?>
	<option value="<?php echo $timeslot->id;?>">
		<?php echo $timeslot->start_time." to ".$timeslot->end_time?>
	</option>
        <?php endforeach;?>
<?php } else { ?>
	<option>No Timeslots Found. Choose Another Date or another Branch</option>
<?php } ?>