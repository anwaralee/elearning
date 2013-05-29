<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the trainer?");	
}
</script>
<div class="h_left"><h2>Trainer Manager</h2></div>
<div class="seperator"></div>
<div class="add_new"><a href="<?php echo base_url();?>trainers/add_trainer" class="btn btn-inverse">Add New</a></div>
<div class="seperator"></div>
<div class="add_new"><a href="<?php echo base_url();?>course/assign_trainer" class="btn btn-inverse">Assign Courses</a></div>
<div class="seperator"></div>
<table width="60%">
<tr>
<th>S/N</th>
<th>Trainer</th>
<th>Action</th>
</tr>

<?php
if($trainer)
{
	$i = 0;
	while($c = mysql_fetch_assoc($trainer))
	{
		$i++;
		echo "<tr>
		<td class='c_left'>".$i."</td>
		<td class='c_right'>".$c['username']."</td>
		<td class='action'>
		<a href= '".base_url()."trainers/delete_trainer/".$c['trainer_id']."' onclick='return show_confirm();' class='btn btn-danger'>Remove</a>
		<a href = '".base_url()."trainers/edit_trainer/".$c['trainer_id']."' class='btn btn-info'>Edit</a>
                </td></tr>";
	}
}
?>
</table>