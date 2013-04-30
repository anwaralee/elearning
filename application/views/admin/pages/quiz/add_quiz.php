<?php
$this->load->model('admin/quiz_model');
?>
<h2>Add Test</h2>
<div class="seperator"></div>
<form method="post" action="<?php echo base_url();?>quiz/add">
<table>
<tr><td>Title :</td><td><input type="text" name="title"></td></tr>
<tr><td>Description :</td><td><textarea name="desc"></textarea></td>
<tr><td>Lesson :</td><td><select name="cid"><?php if($sub == NULL)echo "<option value=''>No Lessons Available</option>";
else 
{
	while($s = mysql_fetch_assoc($sub))
	{
			$ch = $this->quiz_model->exclude($s['course_id']);
			if($ch == TRUE)
			{
		echo "<option value='".$s['course_id']."'>".$s['course_name']."</option>";
		}
		}
		}?></select></td></tr>
<tr><td>Full Marks :</td><td><input type="text" name="full"></td></tr>
<tr><td>Pass Marks :</td><td><input type="text" name="pass"></td></tr>
<tr><td>Time Limit :</td><td><input type="text" name="time"></td></tr>
<tr><td><input type="checkbox" name="status"></td><td>Is active?</td></tr>
</table>
<div class="seperator"></div>
<input type="submit" value="Add" class="btn btn-primary">
</form>