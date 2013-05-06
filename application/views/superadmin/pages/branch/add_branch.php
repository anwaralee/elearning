<div class="h_left"><h2>Add new Branch</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>branch/add" method="post">
<h3>Branch Name:</h3>
<input type="text" name="branch_name">
<h3>Branch Description:</h3>
<textarea name="branch_desc"></textarea>
<h3>Trainer Details:</h3>
<textarea name="trainer_details"></textarea>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
