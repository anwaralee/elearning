<script language="javascript">
$(function(){
		   $('#lesson').validate();
		   });
	
</script>
<script language="javascript">
$(document).ready(function () {
    $('#other').click(function (){
		$('#in').show();
		$('#in').attr('name','time');
    });
	$('.tym').click(function (){
		$('#in').hide();
		$('#in').removeAttr('name','time');
    });
	
	$('#otloc').click(function (){
		$('#txtloc').show();
		$('#txtloc').attr('name','location');
    });
	$('.loc').click(function (){
		$('#txtloc').hide();
		$('#txtloc').removeAttr('name','location');
    });
});

</script>
<div class="h_left"><h2>Edit Schedule</h2></div>
<div class="seperator"></div>
<?php
	$this->load->model('admin/schedule_model');
	$getTrainer=$this->schedule_model->getTrainer();
	$getTrainer2=$this->schedule_model->getTrainer();
if($records)
{
$co = mysql_fetch_assoc($records);
		?>
<form action="<?php echo base_url();?>schedule/update_schedule/<?php echo $co['training_id']?>" method="post" enctype="multipart/form-data" id="lesson">

<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" value="<?php echo $co['training_title'];?>" class="required">

<h3>Description:</h3>
<textarea name="desc"><?php echo $co['training_desc'];?></textarea>
<h3>Trainer:</h3>
<select name="trainer">
	<option value="0">ALL</option>
    <?php 
	if($getTrainer)
	{
	while($t=mysql_fetch_assoc($getTrainer))
	{
    	if($t['trainer_id']==$co['trainer_id'])
		{
	?>
			<option value="<?php echo $t['trainer_id'];?>" selected="selected"><?php echo $t['username'];?></option>
    <?php 	
		}
		else 
		{
	?>
    	<option value="<?php echo $t['trainer_id'];?>"><?php echo $t['username'];?></option>
    <?php
		}
	}
	}
	else
	{
	?>
    <option value="">No active trainer</option>
    <?php  } ?>
</select>

<h3>Assistant Trainer:</h3>
<select name="trainer2">
<option value="">--None--</option>
    <?php 
	if($getTrainer2)
	{
	while($t=mysql_fetch_assoc($getTrainer2))
	{
    	if($t['trainer_id']==$co['trainer2_id'])
		{
	?>
			<option value="<?php echo $t['trainer_id'];?>" selected="selected"><?php echo $t['username'];?></option>
    <?php 	
		}
		else 
		{
	?>
    	<option value="<?php echo $t['trainer_id'];?>"><?php echo $t['username'];?></option>
    <?php
		}
	}
	}
	else
	{
	?>
    <option value="">No active trainer</option>
    <?php  } ?>
</select>

<h3>Date:</h3>
<input type="text" size="12" id="inputField" value="<?php echo $co['training_date'];?>"  name="date"/>
<!--<input type="text" name="date" value="<?php //echo $co['training_date'];?>">-->
<h3>Time:</h3>
<input type="radio" name="time" value="9am - 12pm" <?php if($co['training_time']== '9am - 12pm') {?> checked="checked"<?php }?> class='tym'/> 9am - 12pm
<br /><input type="radio" name="time" value="1pm - 4pm" <?php if($co['training_time']== '1pm - 4pm') {?> checked="checked"<?php }?> class='tym'/> 1pm - 4pm
<br /><input type="radio" name="time" value="5pm - 8pm" <?php if($co['training_time']== '5pm - 8pm') {?> checked="checked"<?php }?> class='tym'/> 5pm - 8pm
<br /><input type="radio" name="time" value="9am - 2pm" <?php if($co['training_time']== '9am - 2pm') {?> checked="checked"<?php }?> class='tym'/> 9am - 2pm
<br />
<?php 
	if(($co['training_time']!= '9am - 2pm') && ($co['training_time']!= '5pm - 8pm') && ($co['training_time']!= '1pm - 4pm') && ($co['training_time']!= '9am - 12pm'))
	{
	?> <input type="radio" name="time" id="other" checked="checked"/>
    Others
<input type="text" id="in" value="<?php echo $co['training_time'];?>" name='time' style="display:block;"/> 
<?php 
}
else
	{
	?>
    <input type="radio" name="time" id="other" />
    Others
<input type="text" id="in" style="display:none;"/><?php }?>
<!--<input type="text" name="time" value="<?php /*echo $co['training_time'];*/?>">--> 
<?php $l=$co['training_location']; ?>
<h3>Location:</h3>
<input type="radio" name="location" <?php if($l=='MSIT Mt Gravatt') {?> checked="checked" <?php } ?> value="MSIT Mt Gravatt" class="loc">MSIT Mt Gravatt
<br /><input type="radio" name="location" <?php if($l=='MSIT Loganlea'){ ?> checked="checked" <?php } ?> value="MSIT Loganlea" class="loc">MSIT Loganlea
<br /><input type="radio" name="location" <?php if($l=='Vital One Office') {?> checked="checked" <?php } ?> value="Vital One Office" class="loc">Vital One Office
 <?php
 if($l!='MSIT Mt Gravatt' && $l!='MSIT Loganlea' && $l!='Vital One Office')
 	{
 ?> 
		<br /><input type="radio" name="location" checked="checked" id="otloc">Other Location
		<input type="text" value="<?php echo $l;?>" id="txtloc" style="display:block" name="location"/>
     <?php 
	 }
	 else
	 {
	 ?>
     <br /><input type="radio" name="location" id="otloc">Other Location
		<input type="text" id="txtloc" style="display:none"/>
     <?php 
	 }
	 ?>
<br />
<h3>Equipments required:</h3>
<input type="text" value="<?php echo $co['equipment'];?>"  name="equipment"/>
<h3>Additional Notes:</h3>
<textarea value="<?php echo $co['notes'];?>"  name="notes"/><?php echo $co['notes'];?></textarea>
<div><h3>Is Active : <input type="checkbox" name="active" <?php if($co['status']==1) {?> checked="checked" <?php } ?>></h3></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes " class="btn btn-primary">
</form>
<?php 
}
?>