<div class="h_left"><h2>Add new Batch</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>batch/add" method="post">
<h3>Batch Name:</h3>
<input type="text" name="batch_name">
<h3>Batch Description:</h3>
<textarea name="batch_desc"></textarea>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
