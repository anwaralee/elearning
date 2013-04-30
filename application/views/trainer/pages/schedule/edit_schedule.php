<script language="javascript">
$(function(){
		   $('#lesson').validate();
		   });
	
</script>
<div class="h_left"><h2>Edit Schedule</h2></div>
<div class="seperator"></div>
<?php 
if($records)
{
$co = mysql_fetch_assoc($records);
		?>
<form action="<?php echo base_url();?>schedule/update_schedule/<?php echo $co['training_id']?>" method="post" enctype="multipart/form-data" id="lesson">

<h3>Title&nbsp;<font color="red">*</font>:</h3>
<input type="text" name="title" value="<?php echo $co['training_title'];?>" class="required">

<h3>Description:</h3>
<textarea name="desc"><?php echo $co['training_desc'];?></textarea>
<h3>Date:(yyyy-mm-dd)</h3>
<input type="text" name="date" value="<?php echo $co['training_date'];?>">
<h3>Time:(hh:mm:ss)</h3>
<input type="text" name="time" value="<?php echo $co['training_time'];?>"> 
<h3>Location:</h3>
<input type="text" name="location" value="<?php echo $co['training_location'];?>">
<div>Is Active : <input type="checkbox" name="active" <?php if($co['status']==1) {?> checked="checked" <?php } ?>></div>
<div class="seperator"></div>
<input type="submit" value=" Save Changes " class="btn btn-primary">
</form>
<?php 
}
?>