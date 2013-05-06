<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the admin?");	
}
</script>
<div class="h_left"><h2>Admin Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>admin/add_admin" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<table width="50%">
<tr>
<th>S/N</th>
<th>Admin Username</th>
<th>Admin FullName</th>
<th>Admin Email</th>
<th>Admin Branch</th>
<th>Action</th>
</tr>



<?php
if($allAdmins)
{
	$i = 0;
	foreach($allAdmins as $admin):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $admin->admin_username;?></td>
			<td class='c_right'><?php echo $admin->admin_fullname;?></td>
			<td class='c_right'><?php echo $admin->admin_email1;?></td>
			<td class='c_right'><?php echo $this->admin_model->getBranchName($admin->branch_id)->branch_name;?></td>
			<td class='action'>
					<a href="<?php echo base_url();?>admin/remove/<?php echo $admin->admin_id;?>" onclick='return show_confirm()' class='btn btn-danger'>Remove</a> 
					<a href ="<?php echo base_url();?>admin/edit_admin/<?php echo $admin->admin_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>