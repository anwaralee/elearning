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

<?php
	$this->load->model('admin/schedule_model');
	$getTrainer=$this->schedule_model->getTrainer();
	$getTrainer2=$this->schedule_model->getTrainer();
?>

<div class="h_left"><h2>Add new Training</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>schedule/add_schedule" method="post" id="lesson">
<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" class="required">
<h3>Description:</h3>
<textarea name="desc"></textarea>
<h3>Trainer:</h3>
<select name="trainer">
	<option value="0">ALL</option>
    <?php 
	if($getTrainer)
	{
	while($t=mysql_fetch_assoc($getTrainer))
	{
	?>
    	<option value="<?php echo $t['trainer_id'];?>"><?php echo $t['username'];?></option>
    <?php		
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
	?>
    	<option value="<?php echo $t['trainer_id'];?>"><?php echo $t['username'];?></option>
    <?php		
	}
	}
	else
	{
	?>
    <option value="">No active trainer</option>
    <?php  } ?>
</select>

<h3 id="fyl">Date:</h3>
<?php 
if($this->uri->segment(4))
{
	$d = $this->uri->segment(4);
	if(($d == 1) ||($d == 2) ||($d == 3) ||($d == 4) ||($d == 5) ||($d == 6) ||($d == 7) ||($d == 8) ||($d == 9))
			{
				$d = '0'.$d;
			}
}
?>
<input type="text" size="12" id="inputField"  name="date" <?php if($this->uri->segment(4)){?>value = "<?php echo $d.'-'.$this->uri->segment(5).'-'.$this->uri->segment(3);?>"<?php }?>/>
<!--<input type="text" name="date" id="date">--> 
<h3>Time:</h3>
<input type="radio" name="time" value="9am - 12pm" class="tym"/> 9am - 12pm
<br /><input type="radio" name="time" value="1pm - 4pm" class="tym"/> 1pm - 4pm
<br /><input type="radio" name="time" value="5pm - 8pm" class="tym"/> 5pm - 8pm
<br /><input type="radio" name="time" value="9am - 2pm" class="tym"/> 9am - 2pm
<br /><input type="radio" name="time" id="other"/> Others
<input type="text" id="in" style="display:none"/> 

<!--<input type="text" name="time">-->
<h3>Location</h3>
<input type="radio" name="location" value="MSIT Mt Gravatt" class="loc">MSIT Mt Gravatt
<br /><input type="radio" name="location" value="MSIT Loganlea" class="loc">MSIT Loganlea
<br /><input type="radio" name="location" value="Vital One Office" class="loc">Vital One Office
<br /><input type="radio" name="location" id="otloc">Other Location
<input type="text" id="txtloc" style="display:none" />
<h3>Equipments required:</h3>
<input type="text" name="equipment"/>
<h3>Additional Notes:</h3>
<textarea name="notes"/></textarea>
<div><h3>Is Active : <input type="checkbox" name="active"></h3></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
