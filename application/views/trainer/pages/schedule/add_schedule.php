<script language="javascript">
$(function(){
		   $('#lesson').validate();
		   });
	
</script>

<div class="h_left"><h2>Add new Training</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>schedule/add_schedule" method="post" id="lesson">
<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" class="required">
<h3>Description:</h3>
<textarea name="desc"></textarea>
<h3 id="fyl">Date:</h3>
<input type="text" name="date" id="date" value="<?php echo set_value('date'); ?>">
<h3>Time:</h3>
<input type="text" name="time">
<h3>Location</h3>
<input type="text" name="location">
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
