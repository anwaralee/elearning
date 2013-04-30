<div class="h_left"><h2>Add new Course</h2></div>
<div class="seperator"></div>
<form action="<?php echo base_url();?>category/add" method="post">
<h3>Title:</h3>
<input type="text" name="title">
<h3>Description:</h3>
<textarea name="desc"></textarea>
<div>Is Active : <input type="checkbox" name="active"></div>
<div class="seperator"></div>
<input type="submit" value=" Add " class="btn btn-primary">
</form>
