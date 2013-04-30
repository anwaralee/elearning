<?php 
if($rec !=NULL)
{
	$quiz = mysql_fetch_assoc($rec);
	?>
<h2>Edit Test</h2><?php if($this->uri->segment(4)){?><b>(Updated Successfully)</b><br><br><?php }?>
<div class="seperator"></div>
<form method="post" action="<?php echo base_url();?>quiz/edit/<?php echo $this->uri->segment(3);?>">
<table>
<tr><td>Title :</td><td><input type="text" name="title" value="<?php if($quiz['quiz_title'])echo $quiz['quiz_title'];?>"></td></tr>
<tr><td>Description :</td><td><textarea name="desc"><?php if($quiz['quiz_desc'])echo $quiz['quiz_desc'];?></textarea></td>
<tr><td>Course :</td><td><select name="cid">
<?php
while($s = mysql_fetch_assoc($sub)){echo "<option value='".$s['course_id']."'";
if($quiz['course_id'] == $s['course_id'])echo " selected= 'selected' >";
else echo ">";
echo $s['course_name']."</option>";}?></select></td></tr>
<tr><td>Full Marks :</td><td><input type="text" name="full" value="<?php if($quiz['quiz_full'])echo $quiz['quiz_full'];?>"></td></tr>
<tr><td>Pass Marks :</td><td><input type="text" name="pass" value="<?php if($quiz['quiz_pass'])echo $quiz['quiz_pass'];?>"></td></tr>
<tr><td>Time Limit :</td><td><input type="text" name="time" value="<?php if($quiz['quiz_time'])echo $quiz['quiz_time'];?>"></td></tr>
<tr><td><input type="checkbox" name="status" <?php if($quiz['quiz_status'] == 1){?>checked="checked"<?php }?>></td><td>Is active?</td></tr>
</table>
<div class="seperator"></div>
<input type="submit" value="Update" class="btn btn-primary">
</form>

    <?php
}

?>
