<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the category?");	
}
</script>
<div class="h_left"><h2>Course</h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>category/add_category" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<table width="50%">
<tr>
<th>S/N</th>
<th>Title</th>
<th>Action</th>
</tr>



<?php
if($cat)
{
	$i = 0;
	while($c = mysql_fetch_assoc($cat))
	{
		$i++;
		echo "<tr><td>".$i."</td><td class='c_right'>".$c['cat_title']."</td><td class='action'><a href= '".base_url()."category/remove/".$c['cat_id']."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a> <a href = '".base_url()."category/edit_category/".$c['cat_id']."' class='btn btn-info'>Edit</a></td></tr>";
	}
}
?>

</table>