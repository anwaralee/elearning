<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the course?");	
}
</script>
<div class="h_left"><h2>Lesson Manager</h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>course/add_course" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form>
<form action="" method="post">
<select name="cat" onchange="javascript:this.form.submit();">
<?php if($cat == NULL)
{
	?>
    <option value="">No Course Available</option>
	<?php 
}
else
{
	?>
    <option value="">Select a course</option>
<?php
while($row = mysql_fetch_assoc($cat))
{
	?>
    <option value="<?php echo $row['cat_id'];?>"
    <?php
	if(isset($_POST['']))
	{
		if($_POST['cat']==$row['cat_id'])
		{
			?>
            selected="selected"
            <?php
		}
	}
	else if($this->session->userdata('course_list'))
	{
		if($this->session->userdata('course_list')==$row['cat_id'])
		{
			?>
            selected="selected"
            <?php
		}	
	}
	?>
    ><?php echo $row['cat_title'];?></option>
    <?php
}
?>
<?php }?></select></form></div>
<?php
if(isset($_POST['cat']) || $this->session->userdata('course_list'))
{
	
	//$cat_search=$this->session->userdata('course_list');
if($course)
{	
?>
<table width="75%">
<tr>
<th>S/N</th>
<th>Title</th>
<th>Action</th>
<th>Display Order</th>
</tr>
<?php

    
	$i = 0;
	while($c = mysql_fetch_assoc($course))
	{
		$i++;
		echo "<tr><td>".$i."</td><td class='c_right'>".$c['course_name']."</td><td class='action'><a href= '".base_url()."course/remove/".$c['course_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a> ";
		if($c['course_type_title']=='Questionaire')
		{
			echo "<a href = '".base_url()."course/edit_questionaire/".$c['course_id']."' class='btn btn-info'>";	
		}
		else
		{
		echo "<a href = '".base_url()."course/edit_course/".$c['course_id']."' class='btn btn-info'>";
		}
		echo "Edit</a></td><td>";
		if($c['order_by']==0)
		{
			echo "Inactive or Unavailable";	
		}
		else
		{
		echo $c['order_by']." ( <a href='".base_url()."course/update_order/up/".$c['course_id']."'>up</a> | <a href='".base_url()."course/update_order/down/".$c['course_id']."'>down</a> )";
		}
		echo "</td></tr>";
	}

?>
</table>
<?php }
else echo "<h3>No Lessons found.</h3>";
}?>