<?php if(!empty($sessionsByCourse)) { ?>
	<?php foreach($sessionsByCourse as $session):?>
           	<option value="<?php echo $session->session_id;?>"><?php echo $session->session_name;?></option>
	<?php endforeach;?>
<?php } else { ?>
	<option value="0">No Sessions Found. Add Sessions</option>
<?php } ?>