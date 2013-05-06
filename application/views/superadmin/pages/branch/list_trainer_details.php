<div class="h_left"><h2>Trainer Details Management </h2></div>
<div class="seperator"></div>

<table width="50%">
<tr>
<th>S/N</th>
<th>Branch</th>
<th>Trainers Detail</th>
<th>Action</th>
</tr>



<?php
if($allBranches)
{
	$i = 0;
	foreach($allBranches as $branch):
		$i++;
	?>
		<tr>
			<td><?php echo $i;?></td>
			<td class='c_right'><?php echo $branch->branch_name;?></td>
			<td class='c_right'><?php echo $branch->trainer_details;?></td>
			<td class='action'>
				<a href ="<?php echo base_url();?>branch/edit_trainer_details/<?php echo $branch->branch_id;?>" class='btn btn-info'>Edit</a>
			</td>
		</tr>
	<?php
		endforeach;
}
?>

</table>