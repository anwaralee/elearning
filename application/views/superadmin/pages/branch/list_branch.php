<script type="text/javascript">
function show_confirm()
{
return confirm("Are you sure you want to remove the branch?");	
}
</script>
<div class="h_left"><h2>Branch Management </h2></div>
<div class="seperator"></div>
<div class="add_new"><form action="<?php echo base_url();?>branch/add_branch" method="post"><input type="submit" value="Add new" name="add" class="btn btn-inverse"></form></div>

<table width="50%">
<tr>
<th>S/N</th>
<th>Branch</th>
<th>Action</th>
</tr>



<?php
if($allBranches)
{
	$i = 0;
	foreach($allBranches as $branch):
		$i++;
		echo "<tr><td>".$i."</td><td class='c_right'>".$branch->branch_name."</td><td class='action'><a href= '".base_url()."branch/remove/".$branch->branch_id."' onclick='return show_confirm()' class='btn btn-danger'>Remove</a> <a href = '".base_url()."branch/edit_branch/".$branch->branch_id."' class='btn btn-info'>Edit</a></td></tr>";
	endforeach;
}
?>

</table>