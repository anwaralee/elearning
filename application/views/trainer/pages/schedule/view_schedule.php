<?php
	if($schedules)
	{
	$s=mysql_fetch_assoc($schedules);
	$this->load->model('trainer/schedule_model');
	if($s['trainer_id']!=NULL || $s['trainer_id']!=(-1))
	$t=$this->schedule_model->getTrainer($s['trainer_id']);
	$t2=$this->schedule_model->getTrainer($s['trainer2_id']);
	echo "<h2>".$s['training_title']."</h2>";
?>
    <table>
    <tr><td>Title:</td><td><?php echo $s['training_title']?></td></tr>
    <tr><td>Description:</td><td><?php echo $s['training_desc']?></td></tr>
    <tr>
        <td>Trainer:</td>
        <td>
		<?php 
			if($s['trainer_id']!=NULL || $s['trainer_id']!=0) 
			{echo $t;} 
			else if($s['trainer_id']==0) 
			{echo "All";}
		?></td>
    </tr>
    <tr>
        <td>Assistant Trainer:</td>
        <td>
		<?php 
			if($s['trainer2_id']!=NULL || $s['trainer2_id']!=0) 
			{echo $t2;} 
			else if($s['trainer2_id']==0) 
			{echo "None";}
		?></td>
    </tr>
    <tr><td>Location</td><td><?php echo $s['training_location']?></td></tr>
    <tr><td>Date:</td><td><?php echo $s['training_date']?></td></tr>
    <tr><td>Time:</td><td><?php echo $s['training_time']?></td></tr>
     <tr><td>Equipments Required:</td><td><?php echo $s['equipment']?></td></tr>
      <tr><td>Additional Notes:</td><td><?php echo $s['notes']?></td></tr>
    </table>
    <?php	
	}
?>
 <br /><br /> <button onclick="javascript:history.go(-1);" class="btn">Go back</button>