<h2>Browse Course</h2>
<p>&nbsp;</p>
<form action="search" method="post">
<select name="type" id="drp">
<option value="">Select type</option>
<?php
if($type)
{
	while($t = mysql_fetch_assoc($type))
	{
		?>
        <option value="<?php echo $t['course_type_id'];?>"><?php  echo $t['course_type_title']?></option>
        <?php
	}
}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="cat" id="drp">
<option value="">Select Category</option>
<?php
if($cat)
{
	while($c = mysql_fetch_assoc($cat))
	{
		?>
        <option value="<?php echo $c['cat_id'];?>"><?php  echo $c['cat_title']?></option>
        <?php
	}
}
?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Search" style="width:100px; border:thin #000 solid; height:25px; font-size:14;">
</form>