<?php if(!empty($trainerByCourse)) { ?>
	<option value="<?php echo $trainerByCourse->trainer_id;?>">
		<?php echo $this->schedule_model->getTrainerNameById($trainerByCourse->trainer_id)->firstname." ".$this->schedule_model->getTrainerNameById($trainerByCourse->trainer_id)->lastname;?>
	</option>
<?php } else { ?>
	<option>No Trainer Assigned. Assign a Trainer First</option>
<?php } ?>